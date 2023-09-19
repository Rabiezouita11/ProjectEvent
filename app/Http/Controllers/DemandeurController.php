<?php

namespace App\Http\Controllers;

use App\Events\AdminChannel;
use App\Models\Categorie;
use App\Models\EventDemandeur;
use App\Models\Events;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class DemandeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function about()
    {
        $categories = Categorie::all();
        return view('Client.About.about')->with('categories', $categories);
    }

    public function contact()
    {
        $categories = Categorie::all();
        return view('Client.Contact.contact')->with('categories', $categories);
    }



    public function AjoutContact(Request $request)
    {
        $this->validate($request, [


            'message' => 'string|required|max:255',
            'numero' => 'required|numeric|digits:8',
        ]);

        $contacts = new \App\Models\Contact();
        $contacts->nom = $request['nom'];
        $contacts->email = $request['email'];
        $contacts->numero = $request['numero'];
        $contacts->message = $request['message'];
        $contacts->save();


        return redirect()->route('contact')->with('azer', 'le message a été bien envoyé');
    }





    public function index()
    {


        $usersName = DB::table('users')->get();
        $feedbacksName = DB::table('feedbacks')->get();
        $reservations = DB::table('reservations')->count();
        $categories = Categorie::all();
        $eventss = DB::table('events')
        ->orWhere('status', 'accepted')
        ->count();
        $feedbacks = DB::table('feedbacks')->count();
        $users = DB::table('users')
        ->orWhere('role', 'participant')
        ->orWhere('role', 'demandeur')
        ->count();
        $events = Events::where('status', 'accepted')
            ->orderBy('Nombre_total_abonnés', 'desc')
            ->paginate(5);
        return view('Client.home.home')->with('feedbacksName', $feedbacksName)->with('usersName', $usersName)->with('categories', $categories)->with('events', $events)->with('feedbacks', $feedbacks)->with('eventss', $eventss)->with('users', $users)->with('reservations', $reservations);
    }


    public function profile()
    {
        $categories = Categorie::all();
        return view('Client.profile.profile')->with('categories', $categories);
    }


    // modifier profile 
    public function EditProfile(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif',

        ]);

        $id = $request['id'];
        $users = \App\Models\User::find($id);

        $users->name = $request['name'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('user_images', 'public');
            $users->image = $imagePath;
        }

        $users->update();
        return redirect()->route('profileclient')->with('profileupdate', 'profile modifier avec succés');
    }


    public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);

        $current_user = auth()->user();

        if (Hash::check($request->old_password, $current_user->password)) {

            $current_user->update([
                'password' => bcrypt($request->new_password)
            ]);

            return redirect()->back()->with('passwordChangeSuccess', 'Mot de passe modifié avec succès.')->with('activeTab', 'v-pills-motdepasse-tab');
        } else {
            return redirect()->back()->with('error', 'Ancien mot de passe incorrect.');
        }
    }


    public function ShowEventByCategory($id)
    {

        $categories = Categorie::all();
        return view('Client.Event.EventList')->with('cat', Categorie::find($id))->with('categories', $categories);
    }
    public function ShowEventDetails($id)
    {
        $users = User::all();
        $rates = Rate::all();
        $categories = Categorie::all();
        $event = \App\Models\Events::find($id);
        $averageRating = Rate::where('event_id', $event->id)->avg('rating');

        // $stock =$produits->stock === 0 ? 'Indisponible' : 'Disponible';

        return view('Client.Event.EventDetail.eventDetails')->with('event', $event)->with('categories', $categories)->with('users', $users)->with('rates', $rates)->with('averageRating', $averageRating);
    }

    public function submitRating(Request $request)
    {



        // Create a new rating
        Rate::create([
            'event_id' => $request->input('event_id'),
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
        ]);

        // Update the event's rating status


        return redirect()->back()->with('success', 'Merci pour votre avis');
    }

    public function buyTicket(Request $request)
    {

        $user_id = $request->input('user_id');

        $eventId = $request->input('event_id');
        $PrixbyEvent_id = DB::table('events')->where('id', $eventId)->value('Prix');
        $NomEvent = DB::table('events')->where('id', $eventId)->value('Nom');

        $event = Events::findOrFail($eventId);

        if (!$event->isAvailable()) {
            return redirect()->back()->with('error', 'Les billets ne sont pas disponibles pour cet événement.');
        }




        // Create a reservation
        Reservation::create([
            'event_id' => $eventId,
            'user_id' =>  $user_id,
            'nbr_ticket' => 1,
        ]);

        // Decrement available_tickets
        $event->decrement('Nombre_total_abonnés');

        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'eur',
                        'product_data' => [
                            'name' => $NomEvent,
                        ],
                        'unit_amount'  => $PrixbyEvent_id,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('session'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        return redirect()->back()->with('success', ' Ticket acheté avec succès');
    }

    public function historique()
    {
        $categories = Categorie::all();
        $user_id = auth()->id();

        // Retrieve all reservations, order them by the latest first, and paginate the results
        $reservations = Reservation::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->paginate(5); // You can adjust the number of items per page as needed

        return view('Client.historique.index')->with('reservations', $reservations)->with('categories', $categories);
    }



    public function downloadInvoice(Reservation $reservation)
    {
        // Load the reservation data along with user and event details
        $reservation->load('user', 'event');

        // Create a string containing the user and event information
        $qrData = "User Name: {$reservation->user->name}\n";
        $qrData .= "User Email: {$reservation->user->email}\n";
        $qrData .= "Event Name: {$reservation->event->Nom}\n";
        $qrData .= "Event Date: {$reservation->event->start_date} - {$reservation->event->end_date}\n";
        $qrData .= "Event Start Time: {$reservation->event->start_time}\n";
        $qrData .= "Event End Time: {$reservation->event->end_time}\n";
        $qrData .= "Event Location: {$reservation->event->Location}\n";
        $qrData .= "Prix: {$reservation->event->Prix}  TND\n";



        // Generate the QR code from the concatenated data
        $qrCode = QrCode::format('png')->size(200)->generate($qrData);
        $tempFilePath = storage_path('app/public/qrcode.png'); // Save the QR code image to a public directory

        // Save the QR code image to the public directory
        file_put_contents($tempFilePath, $qrCode);

        // Generate the PDF using the invoice template view
        $pdf = PDF::loadView('Client.invoices.invoice-template', compact('reservation', 'tempFilePath'));

        // Define the PDF filename
        $filename = 'Facture-' . $reservation->id . '.pdf';

        // Download the PDF with a specific filename
        return $pdf->download($filename);
    }
    public function addEventByDemandeur(Request $request)
    {
        $validatedData = $request->validate([
            'Nom' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'Nombre_total_abonnés' => 'required|integer',
            'Prix' => 'required|integer',
            'start_date' => 'required|string|max:255',
            'end_date' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($request) {
                    $start_date = strtotime($request->input('start_date'));
                    $end_date = strtotime($value);

                    if ($end_date <= $start_date) {
                        $fail('The end date must be greater than the start date.');
                    }
                },
            ],
            'start_time' => 'required|string|max:255',
            'end_time' => 'required|string|max:255|after:start_time',
            'Description' => 'required|string',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required',
        ]);

        // Handle image upload
        $imagePath = $request->file('Image')->store('event_images', 'public');

        $event = new \App\Models\Events;
        $event->Nom = $validatedData['Nom'];
        $event->Location = $validatedData['Location'];
        $event->Nombre_total_abonnés = $validatedData['Nombre_total_abonnés'];
        $event->Prix = $validatedData['Prix'];
        $event->start_date = $validatedData['start_date'];
        $event->end_date = $validatedData['end_date'];
        $event->start_time = $validatedData['start_time'];
        $event->end_time = $validatedData['end_time'];
        $event->Description = $validatedData['Description'];
        $event->Image = $imagePath;
        $event->categorie_id = $validatedData['category_id'];
        $event->status = $validatedData['status'];


        $event->save();
        $userEvent = new EventDemandeur();
        $userEvent->user_id = auth()->user()->id;
        // Get the ID of the logged-in user
        $userEvent->event_id = $event->id; // Get the ID of the newly created event
        $userEvent->save();
        $userNom = auth()->user()->name;
        $message = "l'événement <a href='".route('eventsByDemandeur')."'>$event->Nom</a> a été ajouté par $userNom.";
        event(new AdminChannel($message));

        return redirect()->route('home')->with('Demandeur', 'l\'événement a été ajouté avec succès');
    }

    public function search()
    {
        request()->validate([
            'q' => 'required|min:3',
        ]);

        $q = request()->input('q');
        $categories = Categorie::all();

        // Use a stable column for ordering, such as 'id'
        $events = Events::where('Nom', 'like', "%$q%")
            ->where('status', 'accepted')
            ->orderBy('id') // Use 'id' or another stable column
            ->paginate(1000000000);

        return view('Client.Search.index')->with('categories', $categories)->with('events', $events);
    }
}

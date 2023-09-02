<?php

namespace App\Http\Controllers;

use App\Models\Categorie;

use App\Models\Events;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
        $categories = Categorie::all();
        return view('Client.home.home')->with('categories', $categories);
    }


    public function profile()
    {
        $categories = Categorie::all();
        return view('Client.profile.profile')->with('categories', $categories);
    }


    // modifier profile 
    public function EditProfile(Request $request)
    {

        $id = $request['id'];
        $users = \App\Models\User::find($id);

        $users->name = $request['name'];

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

            return redirect()->back()->with('passwordChangeSuccess', 'Password changed successfully')->with('activeTab', 'v-pills-motdepasse-tab');
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
            return redirect()->back()->with('error', 'Tickets are not available for this event.');
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
        return redirect()->back()->with('success', ' ticket acheteé avec succeés');
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
        $qrData .= "Prix: {$reservation->event->Prix}";



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
}

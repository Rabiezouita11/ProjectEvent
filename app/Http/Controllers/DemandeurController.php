<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Categories;
use App\Models\Category;
use App\Models\Events;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DemandeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function about()
    {
        return view('Client.About.about');
    }

    public function contact()
    {
        return view('Client.Contact.contact');
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
        return view('Client.home.home', compact('categories'));
    }


    public function profile()
    {
        return view('Client.profile.profile');
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
                        'currency'     => 'gbp',
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
}

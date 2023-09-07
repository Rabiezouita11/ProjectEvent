<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Events;
use App\Models\Notification;
use App\Models\Notifications;
use Illuminate\Http\JsonResponse;

class AdminController extends Controller
{
    // protected $redirectTo = '/admin';
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function home()
    {
        $users = DB::table('users')
            ->orWhere('role', 'participant')
            ->orWhere('role', 'demandeur')
            ->count();
        $categories = DB::table('categories')->count();
        $events = DB::table('events')->count();
        $feedbacks = DB::table('feedbacks')->count();
        $reservations = DB::table('reservations')->count();

        return view('Admin.home.home', compact('users', 'categories', 'events', 'feedbacks', 'reservations'));
    }

    public function categories()
    {
        $categories = DB::table('categories')->paginate(4);
        return view('Admin.category.index ', compact('categories'));
    }

    public function showPageAddCategory()
    {

        return view('Admin.category.ajouterCategory');
    }



    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }

    protected function guard()
    {
        return Auth::guard();
    }
    protected function loggedOut(Request $request)
    {
        //
    }





    public function AddCategory(Request $request)
    {
        $request->validate([
            'Nom' => 'required|unique:categories|max:255',

        ]);
        DB::table('categories')->insert([
            'Nom' => $request->Nom,

        ]);
        return redirect()->route('categories')->with('success', 'Categorie ajouté avec succés');
    }

    public function deleteCategory(Request $request)
    {

        DB::table('categories')->where('id', '=', $request->id)->delete();
        return redirect()->route('categories')->with('supprimer', 'Categorie supprimé avec succés');
    }

    public function updateCategory(Request $request)
    {

        $id = $request['id'];

        $category = Categorie::find($id);


        $category->Nom = $request['Nom'];
        $category->update();
        return redirect()->route('categories')->with('modifier', 'Categorie modifié avec succés');
    }

    public function events()
    {
        $events = \App\Models\Events::with('categorie')
            ->where('status', 'accepted')
            ->paginate(4);

        $categories = DB::table('categories')->get();

        return view('Admin.Event.index', compact('events', 'categories'));
    }
    public function deleteEvent(Request $request)
    {
        DB::table('events')->where('id', '=', $request->id)->delete();
        return redirect()->route('events')->with('supprimer', 'Event supprimé avec succés');
    }


    public function showPageAddEvents()
    {
        $categories = DB::table('categories')->get();
        return view('Admin.Event.ajouterEvent', compact('categories'));
    }
    public function addEvent(Request $request)
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

        return redirect()->route('events')->with('success', 'Event added successfully!');
    }
    public function updateEvent(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:events,id',
            'Nom' => 'required|string|max:255',
            'Location' => 'required|string|max:255',
            'Nombre_total_abonnés' => 'required|integer',
            'Prix' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'Description' => 'required|string',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        $event = Events::findOrFail($validatedData['id']);
        $event->Nom = $validatedData['Nom'];
        $event->Location = $validatedData['Location'];
        $event->Nombre_total_abonnés = $validatedData['Nombre_total_abonnés'];
        $event->Prix = $validatedData['Prix'];
        $event->start_date = $validatedData['start_date'];
        $event->end_date = $validatedData['end_date'];
        $event->start_time = $validatedData['start_time'];
        $event->end_time = $validatedData['end_time'];
        $event->Description = $validatedData['Description'];
        $event->categorie_id = $validatedData['category_id'];

        if ($request->hasFile('Image')) {
            // Handle image upload
            $imagePath = $request->file('Image')->store('event_images', 'public');
            $event->Image = $imagePath;
        }

        $event->save();

        return redirect()->route('events')->with('modifier', 'Event updated successfully!');
    }

    public function contacts()
    {
        $contacts = DB::table('contacts')->paginate(4);
        return view('Admin.Contact.index ', compact('contacts'));
    }

    public function feedbacks()
    {
        $users = DB::table('users')->get();
        $feedbacks = DB::table('feedbacks')->paginate(4);
        return view('Admin.Feedbacks.index ', compact('feedbacks', 'users'));
    }
    public function Users()
    {
        $users = DB::table('users')->orWhere('role', 'participant')
            ->orWhere('role', 'demandeur')->paginate(4);
        return view('Admin.Users.index ', compact('users'));
    }
    public function deleteUser(Request $request)
    {
        DB::table('users')->where('id', '=', $request->id)->delete();
        return redirect()->route('Users')->with('supprimer', 'User supprimé avec succés');
    }

    public function eventsByDemandeur()
    {
        $events = Events::select('events.*', 'event_demandeurs.user_id')
            ->join('event_demandeurs', 'events.id', '=', 'event_demandeurs.event_id')
            ->paginate(4);

        return view('Admin.EventListDemandeur.index', compact('events'));
    }

    public function accept(Request $request)
    {
        $event_id = $request->id;
        $user_id = $request->user_id;
        $event = Events::findOrFail($event_id);


        // Check if the event is in 'en attente' status
        if ($event->status === 'En attente') {
            $event->update(['status' => 'accepted']);

            $eventName = $event->Nom;

            // Create the notification message with the event name
            $message = "Your event '$eventName' has been accepted.";
            // You can add any additional logic here
            Notifications::create([
                'user_id' =>   $user_id,
                'message' =>  $message,
                'event_id' => $event_id,
            ]);
            return redirect()->route('eventsByDemandeur')->with('accepted', 'Event accepted successfully.');
        }

        return redirect()->route('eventsByDemandeur')->with('error', 'Event cannot be accepted.');
    }

    public function refuse(Request $request)
    {
        $event_id = $request->id;
        $user_id = $request->user_id;
        $event = Events::findOrFail($event_id);


        // Check if the event is in 'en attente' status
        if ($event->status === 'En attente') {
            $event->update(['status' => 'refused']);
            $eventName = $event->Nom;

            // Create the notification message with the event name
            $message = "Your event '$eventName' has been refused.";
            // You can add any additional logic here
            Notifications::create([
                'user_id' => $user_id,
                'message' => $message,
                'event_id' => $event_id,
            ]);

            return redirect()->route('eventsByDemandeur')->with('refused', 'Event refused successfully.');
        }

        return redirect()->route('eventsByDemandeur')->with('error', 'Event cannot be refused.');
    }
}

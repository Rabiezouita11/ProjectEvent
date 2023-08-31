<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Categories;
use App\Models\Category;
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
    public function ShowEventDetails($id){

        $categories = Categorie::all();
        $event = \App\Models\Events::find($id);

        // $stock =$produits->stock === 0 ? 'Indisponible' : 'Disponible';

        return view('Client.Event.EventDetail.eventDetails')->with('event', $event)->with('categories', $categories);



    }
}

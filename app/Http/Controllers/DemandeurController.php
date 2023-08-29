<?php

namespace App\Http\Controllers;

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
        return view('Client.home.home');
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





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

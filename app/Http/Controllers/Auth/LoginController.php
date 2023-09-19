<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        // Store the previous URL in the session
        session()->put('previousUrl', url()->previous());

        return view('auth.login');
    }

    public function redirectTo()
    {
        // Check if a previous URL is stored in the session
        $previousUrl = session()->get('previousUrl');
        $role = Auth::user()->role;
        if ($previousUrl && $role == 'demandeur' || $role == 'participant') {
            return $previousUrl; // Redirect to the stored URL
        }
        else{
            return '/admin';
        }

      
       

      
    }
}
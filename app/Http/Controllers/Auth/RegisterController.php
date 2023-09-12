<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

  use RegistersUsers;

  /**
   * Where to redirect users after registration.
   *
   * @var string
   */
  public function redirectTo()
  {
    $role = Auth::user()->role;
    switch ($role) {
      case 'admin':
        return '/admin';
        break;
      case 'demandeur':
        return '/home';
        break;
      case 'participant':
        return '/home';
        break;

      default:
        return '/aaaa';
        break;
    }
  }

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'role' => ['required', 'string', 'max:255'],
      'g-recaptcha-response' => ['required', 'recaptcha'], // Add reCAPTCHA validation


    ]);
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return \App\Models\User
   */
  protected function create(array $data)
  {
    $recaptchaSecret = '6Ld8HIYjAAAAALw437G-L_PF1PNrNZH4Qq76MvSU'; // Replace with your reCAPTCHA secret key
    $recaptchaResponse = request('g-recaptcha-response');

    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaData = [
      'secret' => $recaptchaSecret,
      'response' => $recaptchaResponse,
    ];

    $recaptchaOptions = [
      'http' => [
        'method' => 'POST',
        'content' => http_build_query($recaptchaData),
      ],
    ];

    $recaptchaContext = stream_context_create($recaptchaOptions);
    $recaptchaVerify = file_get_contents($recaptchaUrl, false, $recaptchaContext);
    $recaptchaResponseData = json_decode($recaptchaVerify);

    if (!$recaptchaResponseData->success) {
      // reCAPTCHA validation failed
      throw new \Exception('reCAPTCHA validation failed');
    }

    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'role' => $data['role'],
      'password' => Hash::make($data['password']),
    ]);
  }
}

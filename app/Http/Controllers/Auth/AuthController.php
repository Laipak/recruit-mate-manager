<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\User;

class AuthController extends Controller
{
    // POST
    public function login(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('login', 'password');

        try {

            if ($user = Sentinel::authenticate($credentials, $request->get('remember_me', false))) {

                Sentinel::login($user);
                Session::flash('success', 'Good day, ' . $user . '.');

            } else {

                Session::flash('error', 'User not found or password wrong');
                return back();

            }

        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            Session::flash('error', $e->getMessage());
            return back();
        }

        return redirect()->route('applicant');
    }

    // GET
    public function logout()
    {
        Sentinel::logout();
        Session::flash('success', 'Logout succesfully !');

        return redirect()->route('home');
    }
}

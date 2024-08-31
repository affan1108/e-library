<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('portal2');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
 
        $credential = ['email' => $request->email, 'password' => $request->password];
        $login = Auth::attempt($credential);
        if ($login) {
            // dd(Auth::check());
            return redirect()->route('home');
        }else{
            return redirect()->back()->withInput()->withErrors("Invalid Credential");
        }
    }
}

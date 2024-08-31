<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }
    public function index(Request $request)
    {
        // $doc = DB::connection('mysql2')->select('select * from m_jabatans');
        session(['key' => 'value']);
        // dd(session('key'));
        // Session::put('test', 'value');
        // dd(Session::get('test'));
        // dd(Auth::user());
        return view('home');
    }


}

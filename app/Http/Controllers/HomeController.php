<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mail = Auth::user()->email;
        Mail::to($mail)->send(new WelcomeMail());
        return redirect()->route('home')->with('welcome','Bello new friend 😀 New user voucher has been sent to your email!');
    }
}

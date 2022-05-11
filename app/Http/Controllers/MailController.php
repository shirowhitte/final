<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeMail;
use App\Mail\ReservationEmail;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\reservation;

class MailController extends Controller
{
    public function sendEmail()
    {
        $mail = Auth::user()->email;
        Mail::to($mail)->send(new WelcomeMail());
        return redirect()->route('home')->with('welcome','Bello new friend 😀 New user voucher has been sent to your email!');
    }

    public function reservationEmail()
    {
        $created = reservation::where('user_id',$id)
        ->where('status','created')
        ->orderBy('created_at','desc')
        ->with('restaurant')->whereDate('created_at','>=',Carbon::today()->format("Y-m-d") )->first();
        return view('emails.reserve', ['rese'=>$created]);
    }
}

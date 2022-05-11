<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\reservation;
use Auth;
use Carbon\Carbon;

class ReservationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id = Auth::user()->id;
        $created = reservation::where('user_id',$id)
        ->where('status','created')
        ->orderBy('created_at','desc')
        ->with('restaurant')->whereDate('created_at','>=',Carbon::today()->format("Y-m-d") )->first();
        return $this->subject('Your reservation has been confirmed!')->markdown('emails.reserve', ['rese'=>$created]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\order;
use Auth;
use Carbon\Carbon;

class OrderEmail extends Mailable
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
        $name = Auth::user()->username;
        $created = order::where('name',$name)
        ->where('status','created')
        ->orWhere('status', 'delivery')
        ->orderBy('created_at','desc')->first();

        return $this->subject('Your order has been confirmed!')->markdown('emails.order', ['or'=>$created]);
    }
}

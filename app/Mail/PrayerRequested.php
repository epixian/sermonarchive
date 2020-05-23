<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrayerRequested extends Mailable
{
    use Queueable, SerializesModels;

    public $prayer;
    public $from;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($prayer, $from)
    {
        $this->prayer = $prayer;
        $this->from = $from;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(auth()->user())->view('emails.prayer_requested');
    }
}

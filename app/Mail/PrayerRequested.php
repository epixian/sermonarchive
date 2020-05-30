<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PrayerRequested extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $body;
    public $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->body = $message['body'];
        $this->sender = $message['from'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->sender['email'], $this->sender['name'])
            ->view('emails.prayer_requested')
            ->text('emails.prayer_requested_plain');
;
    }
}

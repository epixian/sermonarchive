<?php

namespace App\Http\Controllers;

use App\Mail\PrayerRequested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PrayerRequestController extends Controller
{
    /**
     * Submit a prayer request
     *
     * @param  Request $request
     * @return void
     */
    public function submit(Request $request)
    {
        $message = $request->validate([
            'body' => 'required',
        ]);

        $message['from'] = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ];

        Mail::to([
            [
                'name' => env('PRAYER_REQUEST_NAME', 'Prayer Request Recipient'),
                'email' => env('PRAYER_REQUEST_EMAIL', 'mail@example.com'),
            ]
        ])->send(new PrayerRequested($message));
    }
}

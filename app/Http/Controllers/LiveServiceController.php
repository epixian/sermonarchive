<?php

namespace App\Http\Controllers;

use App\Models\Breeze;
use App\Events\LiveServiceMessageSent;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LiveServiceController extends Controller
{
    /**
     * Display the live service
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $service = Service::getLiveService();

        return view('services.current', compact('service'));
    }

    /**
     * Process a check-in request for attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkIn(Request $request)
    {
        $person = $request->validate([
            'id' => 'required'
        ]);

        $breeze = new Breeze();

        return response($breeze->recordAttendance($person['id'], $this->service->breeze_id))->cookie('nlg-live-attendance-recorded', 1440);
    }

    /**
     * Fetch all messages.
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return $this->service->messages()->with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = auth()->user();

        // save the message on the server
        $message = $this->service->messages()->create([
            'user_id' => $user->id,
            'message' => $request->input('message'),
        ]);

        // add to the broadcast queue
        broadcast(new LiveServiceMessageSent($message, $user))/*->toOthers()*/;

        return ['status' => 'Message Sent!'];
    }
}

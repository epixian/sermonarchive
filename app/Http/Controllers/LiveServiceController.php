<?php

namespace App\Http\Controllers;

use App\Models\Breeze;
use App\Events\LiveServiceMessageSent;
use App\Models\Service;
use Illuminate\Http\Request;

class LiveServiceController extends Controller
{
    /**
     * Display the live service
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if ($service = Service::getLiveService()) {
            return view('services.current', compact('service'));
        }

        return response()->redirectTo('/sermons');
    }

    /**
     * Process a check-in request for attendance.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkIn(Request $request)
    {
        $person = $request->validate([
            'id' => 'required',
            'service_id' => 'required',
        ]);

        $service_breeze_id = Service::findOrFail($request->get('service_id'))?->breeze_id;
        $breeze = new Breeze();

        return response($breeze->recordAttendance($person['id'], $service_breeze_id))->cookie('nlg-live-attendance-recorded', 1440);
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

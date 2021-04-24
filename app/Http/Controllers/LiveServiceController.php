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
        $service = $this->getLiveService();

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

    /**
     * Get the live service.
     *
     * @return Service
     */
    private function getLiveService()
    {
        /** @var Collection|Service[] $services */
        $services = Service::whereHas('sermon', function ($sermon) {
                return $sermon->inProgress();
            })
            ->orWhere(
                'service_date',
                '<=',
                Carbon::now()->addDay(1)->setTimezone(config('sermonarchive.event_timezone'))
            )
            ->with('sermon')
            ->latest('service_date')
            ->get()
            ;

        if ($service = $this->getServicesWithSermonsInProgress($services)->first()) {
            return $service;
        }

        if ($service = $this->getServicesWithSermonsScheduledWithinSixHours($services)->first()) {
            return $service;
        }

        if ($service = $this->getServicesWithSermons($services)->first()) {
            return $service;
        }

        return $services->first();
    }

    private function getServicesWithSermonsInProgress($services)
    {
        return $services
            ->filter(fn (Service $service) => $service->sermon && $service->sermon->is_live);
    }

    private function getServicesWithSermonsScheduledWithinSixHours($services)
    {
        return $services
            ->filter(function (Service $service) {
                return $service->sermon &&
                    $service->sermon->scheduled_for < Carbon::now()->addHours(6);
            })
            ->sortBy('scheduled_for', SORT_DESC);
    }

    private function getServicesWithSermons($services)
    {
        return $services->filter(fn (Service $service) => $service->sermon);
    }
}

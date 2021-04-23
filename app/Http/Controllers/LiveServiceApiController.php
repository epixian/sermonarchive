<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class LiveServiceApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = $this->getLiveService();

        return $service ? new ServiceResource($service) : response(null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'stream_started' => 'sometimes|boolean',
            'stream_ended' => 'sometimes|boolean',
            'recording_done' => 'sometimes|boolean',
        ]);

        $service = $this->getLiveService();
        $service->sermon()->update($validated);

        return new ServiceResource($service->fresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    /**
     * Get the live service.
     *
     * @return Service
     */
    private function getLiveService()
    {
        /** @var Collection|Service[] $services */
        $services = Service::where(
                'service_date',
                '<=',
                Carbon::now()->addHours(6)->setTimezone(config('sermonarchive.event_timezone'))
            )
            ->where(
                'service_date',
                '>=',
                Carbon::now()->subHours(6)->setTimezone(config('sermonarchive.event_timezone'))
            )
            ->with('sermon')
            ->latest('service_date')
            ->get();

        if ($service = $services->filter(fn (Service $service) => $service->sermon->is_live)->first()) {
            return $service;
        }

        return $services->first();
    }
}

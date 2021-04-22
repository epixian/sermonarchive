<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
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

        // if one of the services is live then return that one
        if ($service = $services->filter(fn (Service $service) => $service->sermon->is_live)->first()) {
            return new ServiceResource($service);
        }

        // otherwise return the first
        return new ServiceResource($services->first());
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
        //
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
}

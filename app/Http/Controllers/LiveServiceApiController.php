<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use App\Validators\SermonStatusValidator;
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
        $validated = app(SermonStatusValidator::class)->validate();

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

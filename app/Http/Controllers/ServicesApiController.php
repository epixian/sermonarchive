<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServiceResource;
use App\Models\Breeze;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ServicesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceResource::collection(Service::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'service_date' => 'required|date',
            'service_time' => 'required|string',
            'breeze_id' => 'nullable',
            'description' => 'nullable',
            'sermon' => 'sometimes|array',
            'sermon.name' => 'required',
            'sermon.speaker_id' => 'required',
            'sermon.description' => 'nullable',
        ]);

        if (config('app.env') === 'production') {
            $validated['breeze_id'] = Breeze::TEST_SERVICE_ID;
        }

        if (! $validated['name']) {
            $validated['name'] = 'Morning Worship Services (Online)';
        }

        if (! $validated['breeze_id']) {
            $breeze = new Breeze();
            $event = $breeze->createServiceEvent($validated['name'], $validated['service_date']);
            $validated['breeze_id'] = $event->id;
        }

        $service = Service::create(Arr::except($validated, 'sermon'));

        $service->sermon()->create([
            'name' => Arr::get($validated, 'sermon.name'),
            'description' => Arr::get($validated, 'sermon.description'),
            'speaker_id' => Arr::get($validated, 'sermon.speaker_id'),
        ]);

        return new ServiceResource($service);
    }

    /**
     * Display the specified resource.
     *
     * @param  Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'service_date' => 'sometimes|date',
            'service_time' => 'sometimes|string',
            'breeze_id' => 'nullable',
            'description' => 'nullable',
        ]);

        $service->update($validated);

        return new ServiceResource($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

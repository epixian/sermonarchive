<?php

namespace App\Http\Controllers;

use App\Breeze;
use App\Service;
use Illuminate\Http\Request;

class AdminServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->take(10)->get();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "Add";
        return view('services.edit', compact('action'));
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
            'name' => 'sometimes',
            'description' => 'sometimes',
            'service_date' => 'required',
            'breeze_id' => 'sometimes',
        ]);

        if (! $validated['name']) {
            $validated['name'] = 'Morning Worship Services';
        }
        if (! $validated['breeze_id']) {
            $breeze = new Breeze();
            $event = $breeze->createServiceEvent($validated['name'], $validated['service_date']);
            $validated['breeze_id'] = $event->id;
        }

        $service = Service::create($validated);

        return redirect($service->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $action = "Edit";
        return view('services.edit', compact('action', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'service_date' => 'required',
        ]);
        // do breeze insert here but for right now
        // $validated['breeze_id'] = '';

        $service->update($validated);

        return redirect($service->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}

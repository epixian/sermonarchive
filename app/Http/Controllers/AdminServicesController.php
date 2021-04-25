<?php

namespace App\Http\Controllers;

use App\Models\Breeze;
use App\Models\Service;
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
        $services = Service::with('sermon')->latest()->take(10)->get();
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
            'description' => 'nullable',
            'service_date' => 'required|date',
            'service_time' => 'required',
            'breeze_id' => 'sometimes',
        ]);

        if (! $validated['name']) {
            $validated['name'] = 'Morning Worship Services (Online)';
        }
        if (! $validated['breeze_id']) {
            $breeze = new Breeze();
            $event = $breeze->createServiceEvent($validated['name'], $validated['service_date']);
            $validated['breeze_id'] = $event->id;
        }

        $service = Service::create($validated);

        return redirect('/admin' . $service->path() . '/sermon/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $action = 'Edit';
        return view('services.edit', compact('action', 'service'));
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
            'name' => 'sometimes|string',
            'description' => 'nullable',
            'service_date' => 'sometimes|date',
            'service_time' => 'sometimes|string',
        ]);
        // do breeze insert here but for right now
        // $validated['breeze_id'] = '';

        $service->update($validated);

        return redirect('/admin' . $service->path());
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

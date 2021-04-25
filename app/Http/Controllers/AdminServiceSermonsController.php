<?php

namespace App\Http\Controllers;

use App\Sermon;
use App\Service;
use App\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminServiceSermonsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        $action = "Add";
        $speakers = Speaker::all();
        return view('sermons.edit', compact(['action', 'service', 'speakers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'speaker_id' => 'required',
            'scheduled_time' => 'required',
        ]);

        $validated['publish_date'] = $service->service_date;
        $validated['stream_key'] = (string) Str::uuid();
        $sermon = $service->sermons()->create($validated);

        return redirect($service->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, Sermon $sermon)
    {
        //
    }
}

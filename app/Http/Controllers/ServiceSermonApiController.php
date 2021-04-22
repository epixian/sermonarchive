<?php

namespace App\Http\Controllers;

use App\Http\Resources\SermonResource;
use App\Models\Sermon;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceSermonsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function index(Service $service)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'speaker_id' => 'required',
            'scheduled_time' => 'sometimes',
        ]);

        $validated['publish_date'] = $service->service_date;
        $validated['stream_key'] = (string) Str::uuid();

        $sermon = $service->sermon()->create($validated);

        return new SermonResource($sermon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, Sermon $sermon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service, Sermon $sermon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, Sermon $sermon)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use App\Models\Service;
use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class AdminServiceSermonsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Service  $service
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Service $service)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'sometimes',
                'speaker_id' => 'required',
            ],
            [
                'name.required' => 'A sermon title is required.',
            ]
        );

        $validated = $validator->validate();

        $validated['stream_key'] = (string) Str::uuid();

        $service->sermon()->create($validated);

        return redirect('/admin'.$service->path());
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

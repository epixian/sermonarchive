<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use App\Models\Speaker;
use App\Validators\SermonStatusValidator;
use Illuminate\Http\Request;

class AdminSermonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sermons = Sermon::all();
        return view('sermons.index', compact('sermons'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function show(Sermon $sermon)
    {
        return view('sermons.show', compact('sermon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function edit(Sermon $sermon)
    {
        $action = "Edit";
        $speakers = Speaker::all();
        $service = $sermon->service;
        return view('sermons.edit', compact(['sermon', 'action', 'speakers', 'service']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sermon $sermon)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'sometimes',
            'speaker_id' => 'required',
            'recording_url' => 'sometimes',
        ]);

        $sermon->update($validated);

        return redirect('/admin' . $sermon->service->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sermon $sermon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Sermon $sermon)
    {
        $validated = app(SermonStatusValidator::class)->validate();

        $sermon->update($validated);

        return $sermon->getStatus();
    }
}

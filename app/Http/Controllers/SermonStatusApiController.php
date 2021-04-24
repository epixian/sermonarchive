<?php

namespace App\Http\Controllers;

use App\Http\Resources\SermonResource;
use App\Models\Sermon;
use App\Validators\SermonStatusValidator;
use Illuminate\Http\Request;

class SermonStatusApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function show(Sermon $sermon)
    {
        return $sermon->getStatus();
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
        $validated = app(SermonStatusValidator::class)->validate();

        $sermon->update($validated);

        return new SermonResource($sermon);
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
}

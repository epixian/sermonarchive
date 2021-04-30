<?php

namespace App\Http\Controllers;

use App\Http\Resources\SermonResource;
use App\Models\Sermon;

class SermonsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SermonResource::collection(Sermon::with('speaker')->latest()->paginate());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function show(Sermon $sermon)
    {
        return new SermonResource($sermon);
    }
}

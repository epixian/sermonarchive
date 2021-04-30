<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;

class SermonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sermons = Sermon::with('speaker')->latest()->get();
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
     * Get the stream's status
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Models\Sermon $sermon
     * @return void
     */
    public function status(Request $request, Sermon $sermon)
    {
        return $sermon->getStatus();
    }
}

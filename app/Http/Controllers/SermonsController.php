<?php

namespace App\Http\Controllers;

use App\Sermon;
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
        $sermons = Sermon::with('speaker')->get();
        return view('sermons.index', compact('sermons'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sermon  $sermon
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
     * @param  App\Sermon $sermon
     * @return void
     */
    public function status(Request $request, Sermon $sermon)
    {
        return $sermon->getStatus();
    }
}

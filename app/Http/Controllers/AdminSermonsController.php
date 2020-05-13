<?php

namespace App\Http\Controllers;

use App\Sermon;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function edit(Sermon $sermon)
    {
        $action = "Edit";
        return view('sermons.edit', compact('action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sermon $sermon)
    {
        $validated = $request->validate([
            'name' => 'required',
            'publish_date' => 'required',
        ]);

        $sermon->update($validated);

        return redirect($sermon->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sermon $sermon)
    {
        //
    }
}

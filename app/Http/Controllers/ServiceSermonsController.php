<?php

namespace App\Http\Controllers;

use App\Sermon;
use App\Service;
use Illuminate\Http\Request;

class ServiceSermonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function index(Service $service)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function create(Service $service)
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, Sermon $sermon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service, Sermon $sermon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @param  \App\Sermon  $sermon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service, Sermon $sermon)
    {
        //
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

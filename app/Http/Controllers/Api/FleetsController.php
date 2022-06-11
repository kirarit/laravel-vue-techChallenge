<?php

namespace App\Http\Controllers\Api;

use App\Models\Fleet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FleetResource;
use App\Http\Requests\Api\FleetRequest;

class FleetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new FleetResource(Fleet::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FleetRequest $request)
    {
        $fleet = Fleet::create($request->only(['name', 'status']));

        return (new FleetResource($fleet))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fleet = Fleet::find($id);
        return response()->json($fleet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fleet = Fleet::find($id);
        return response()->json($fleet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FleetRequest $request, $id)
    {
        $fleet = Fleet::find($id);
        $fleet->update($request->all());
        return response()->json('Fleet Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fleet  $fleet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fleet $fleet)
    {
        $fleet->delete();
        return response(null, 204);
    }
}

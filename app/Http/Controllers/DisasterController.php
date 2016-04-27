<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Disaster;
use Illuminate\Support\Facades\Input;

class DisasterController extends Controller
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
    public function store(Request $request)
    {
        $building_id = $request->building_id;

        $inputs = $request->all();
        $disaster = Disaster::create($inputs);
        
        return redirect()->route('buildings.show', $building_id)->with('message', 'Successfully Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $building_id = $request->building_id;

        $updates = $request->all();
        $disaster = Disaster::find($id);
        $disaster = $disaster->update($updates);
        
        return redirect()->route('buildings.show', $building_id)->with('message', 'Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building_id = Input::get('building_id');

        $disaster = Disaster::destroy($id);

        return redirect()->route('buildings.show', $building_id)->with('message', 'Successfully Remove!');
    }

    public function addDisasters(Request $request)
    {
        dd($request);

    }
}

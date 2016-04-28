<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Disaster;
use Illuminate\Support\Facades\Input;
use narutimateum\Toastr\Facades\Toastr;

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
        Toastr::success('Successfully Added!');

        return redirect()->route('buildings.show', $building_id);
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
        Toastr::info('Successfully Updated!');
        
        return redirect()->route('buildings.show', $building_id);
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

        Toastr::error('Successfully Remove!');

        return redirect()->route('buildings.show', $building_id);
    }

    public function addDisasters(Request $request)
    {
        $barangay_id = $request->barangay_id;

        if( !empty( $request->households ) ) {                   
            foreach( $request->households as $household_id ) {
                $disaster = new Disaster;
                $disaster->building_id = $household_id;
                $disaster->type = $request->type;
                $disaster->year = $request->year;
                $disaster->description = $request->description;
                $disaster->save();
            }
        }

        Toastr::success('Successfully Added!');

        return redirect()->route('disasters.addpage', $barangay_id);
    }

    public function addDisaster($barangay_id)
    {
         return view('pages.disasters.index')->with('barangay_id', $barangay_id);
    }

}

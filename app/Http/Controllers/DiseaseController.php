<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Disease;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use narutimateum\Toastr\Facades\Toastr;

class DiseaseController extends Controller
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
        $resident_id = $request->resident_id;
        $inputs = $request->all();
        $disease = Disease::create($inputs);
        Toastr::success('Successfully Added!');
        
        return redirect()->route('residents.show', $resident_id);
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
        $resident_id = $request->resident_id;

        $updates = $request->all();
        
        $disease = Disease::find($id);
        $disease = $disease->update($updates);
        Toastr::info('Successfully Updated!');
        
        return redirect()->route('residents.show', $resident_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resident_id = Input::get('resident_id');

        $disease = Disease::destroy($id);

        Toastr::error('Successfully Remove!');

        return redirect()->route('residents.show', $resident_id);
    }

}

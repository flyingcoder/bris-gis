<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Family;
use Illuminate\Support\Facades\Input;
use narutimateum\Toastr\Facades\Toastr;


class FamilyController extends Controller
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
        $family = Family::create($inputs);
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
        $family = Family::with('building', 'familyMembers', 'familyMembers.resident')->find($id);

        return view('pages.buildings.family_profiles.index')->with('family',$family);
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
        $updates = $request->all();
        
        $family = Family::find($id);
        $family = $family->update($updates);
        Toastr::info('Successfully Updated!');
        
        return redirect()->route('families.show', $id);
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

        $family = Family::destroy($id);

        Toastr::error('Successfully Remove!');

        return redirect()->route('buildings.show', $building_id);
    }
}

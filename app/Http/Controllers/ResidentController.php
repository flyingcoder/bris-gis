<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Resident;
use brisgis\FamilyMember;
use Illuminate\Support\Facades\Input;

class ResidentController extends Controller
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
        $family_id = $request->family_id;

        $inputs = $request->all();
        $resident = Resident::create($inputs);

        $family_member = new FamilyMember();
        $family_member->resident_id = $resident->id;
        $family_member->family_id = $request->family_id;
        $family_member->relation_head = $request->relation_head;
        $family_member->save();

        return redirect()->route('families.show', $family_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = Resident::with('diseases', 'familyMember')->find($id);

        return view('pages.buildings.resident_profiles.index')->with('resident', $resident);
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
        
        $resident = Resident::find($id);
        $resident = $resident->update($updates);
        
        return redirect()->route('residents.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $family_id = Input::get('family_id');

        $resident = Resident::destroy($id);

         return redirect()->route('families.show', $family_id);
    }
}

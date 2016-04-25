<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Building;
use brisgis\Barangay;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;



class BuildingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building = Building::with( 'purok', 
                                    'purok.barangay', 
                                    'purok.barangay.municipality', 
                                    'purok.barangay.municipality.province', 
                                    'families', 
                                    'disasters', 
                                    'householdHead', 
                                    'householdHead.resident')->find($id);
        $building;

        return view('pages.buildings.household_details.index')->with('building', $building);
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
        $inputs = $request->all();
        $building = Building::create($inputs);
        
        return $building;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangay_id = Input::get('barangay_id');

        $building = Building::destroy($id);

        return redirect()->route('households.get', $barangay_id);
    }

    public function getHouseholds($barangay_id)
    {    
        $barangay = Barangay::with('puroks', 'puroks.buildings')->find($barangay_id);

        return view('pages.buildings.index')->with('barangay',$barangay);

    }

}

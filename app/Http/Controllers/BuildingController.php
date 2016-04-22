<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Building;
use brisgis\Barangay;
use brisgis\PurokBoundary;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;



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
        $barangay_id = Input::get('id');
        $barangay = Barangay::with('puroks', 'puroks.buildings')->find($barangay_id);

        return view('pages.households.index')->with('barangay',$barangay);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $boundary_id = Input::get('boundary_id');
         $boundary = PurokBoundary::find($boundary_id);
        return Response::json($boundary);
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

        return $building;
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
        $building = Building::destroy($id);

        return $building;
    }
}

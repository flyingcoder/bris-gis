<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Building;
use brisgis\Barangay;
use brisgis\Purok;
use brisgis\Family;
use brisgis\Resident;
use brisgis\FamilyMember;
use brisgis\HouseholdHead;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;
use narutimateum\Toastr\Facades\Toastr;



class BuildingController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        $inputs =  $request->all();

        $building = Building::create($inputs);

        $inputs = array_merge( (array)$inputs, array( 'building_id' => $building->id ) );
        $inputs = array_merge( (array)$inputs, array( 'family_identifier' => $request->last_name . " Family" ) );

        $family = Family::create($inputs);

        $resident = Resident::create($inputs);

        $inputs = array_merge( (array)$inputs, array( 'family_id' => $family->id ) );
        $inputs = array_merge( (array)$inputs, array( 'resident_id' => $resident->id ) );
        $inputs = array_merge( (array)$inputs, array( 'relation_head' => 'Head' ) );

        $family_member = FamilyMember::create($inputs);
        $household_head = HouseholdHead::create($inputs);

        Toastr::success('Successfully Added!');

        return redirect()->route('buildings.show', $building->id);
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
        $updates = $request->all();
        $building = Building::find($id);
        $building = $building->update($updates);
        Toastr::info('Successfully Updated!');
        
        return redirect()->route('buildings.show', $id);
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

        Toastr::error('Successfully Remove!');

        return redirect()->route('households.get', $barangay_id);
    }

    public function getHouseholds($barangay_id)
    {    
        $barangay = Barangay::with('puroks', 'puroks.buildings')->find($barangay_id);

        return view('pages.buildings.index')->with('barangay',$barangay);

    }

    public function addBuilding($barangay_id)
    {
        return view('pages.buildings.create')->with('barangay_id', $barangay_id);
    }

    public function getHouseholdsDetails($barangay_id)
    {
        $household_name = Input::get('household_name');
       $buildings = Building::join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                            ->select('puroks.*', 'puroks.name AS p_name', 'buildings.*', 'buildings.name AS b_name')
                            ->where('puroks.barangay_id' , '=', $barangay_id)
                            ->where('buildings.name', 'LIKE', '%'.$household_name.'%')->get();
       
        return Response::json($buildings);
    }

}

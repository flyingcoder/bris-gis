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
use Illuminate\Support\Facades\DB;



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

    public function importHousehold()
    {
        $barangay_id = Input::get('barangay_id');

        if (Input::hasFile('csv_household')) { 
            
            //get the csv file 
            $handle = fopen(Input::file('csv_household'),"r"); 
            
            //loop through the csv file and insert into database 
            $data = fgetcsv($handle,1000,",",'"','"');

            while ($data = fgetcsv($handle,1000,",",'"','"'))
            { 
                    if ($data[0]) { 
                              $int= rand(512055681,1262055681);
                              $structure = array('Concrete', 'Bamboo', 'Makeshift', 'Masonry', 'Metal', 'Wood');
                              $index = rand(0,5);
                              $constructed = date("Y-m-d",$int);
                                   DB::statement("INSERT INTO buildings (latitude, longitude, purok_id, name, year_constructed, net_value, building_usage, structure, area, holding, no_stories) VALUES 
                                        ( 
                                          '".addslashes($data[3])."',
                                          '".addslashes($data[4])."',
                                          '".addslashes($data[5])."',
                                          '".addslashes($data[9])." Household',
                                          '".$constructed."',
                                          '".addslashes($data[39])."',
                                          'Residential',
                                          '".$structure[$index]."',
                                          '".addslashes($data[41])."',
                                          'Owner',
                                          '1'
                                        ) 
                                    ");

                        $index1 = rand(0,1);
                          $index2 = rand(0,2);
                          
                          $if_4ps= array('Yes','No');
                          $livelihood = array('Livestock', 'Farming', 'Small Business Store');
                          $building_id = DB::getPdo()->lastInsertId();
                         DB::statement("INSERT INTO families (building_id, family_identifier, monthly_income, if_other_livelihood, livelihood, if_4ps) VALUES 
                            ( 
                              '".$building_id."',
                              '".addslashes($data[9])." Family',
                              '".addslashes($data[29])."',
                              'Yes',
                              '".$livelihood[$index2]."',
                              '".$if_4ps[$index1]."'
                            ) 
                        "); 

                         $family_id = DB::getPdo()->lastInsertId();
                         $year = 2013 - $data[13];
                          $index = rand(0,6);
                          $number = rand(213456789,359999999);
                          $contact_number = '09' . (string)$number;
                          $occupation_category = array('Goverment Employee', 'Private Employee', 'Non-Government Organization', 'Businessman', 'Laborer/Unskilled Worker', 'Skilled Worker', 'Unemployed');
                            
                                DB::statement("INSERT INTO residents (last_name, first_name, middle_name, birthdate, gender, civil_status, education, occupation_category, occupation_specific, if_voter, if_disabled, contact_number) VALUES 
                                    ( 
                                      '".addslashes($data[9])."',
                                      '".addslashes($data[10])."',
                                      '".addslashes($data[11])."',
                                      '".$year."-11-12',
                                      '".addslashes($data[12])."',
                                      '".addslashes($data[15])."',
                                      '".addslashes($data[16])."',
                                      '".$occupation_category[$index]."',
                                      '".addslashes($data[18])."',
                                      'Yes',
                                      'No',
                                      '".$contact_number."'
                                    ) 
                                "); 

                        $resident_id = DB::getPdo()->lastInsertId();
                        DB::statement("INSERT INTO family_members (family_id, resident_id, relation_head) VALUES 
                                        ( 
                                          '".$family_id."',
                                          '".$resident_id."',
                                          'Head'
                                        ) 
                                    "); 

                        DB::statement("INSERT INTO household_heads (building_id, resident_id) VALUES 
                                        ( 
                                          '".$building_id."',
                                          '".$resident_id."'
                                        ) 
                                    "); 
                             
                        } 
                    } 
                } 
            // 
        
        Toastr::success('Successfully Added!');

        return redirect()->route('barangays.show', $barangay_id);
    }
}

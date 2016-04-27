<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\FloodMap;
use brisgis\Barangay;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class FloodMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floodMap_id = Input::get('floodMap_id');
        $floodMap = FloodMap::find($floodMap_id);
        
        return Response::json($floodMap);
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
        $floodMap_level = Input::get('floodMap_level');
        $floodMap = Barangay::with('floodMaps')->find($id);
        
        return Response::json($floodMap);
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
        //
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

        $floodMap = FloodMap::destroy($id);

        return redirect()->route('barangays.show', $barangay_id)->with('message', 'Successfully Remove!');
    }

    public function importFloodMap(Request $request)
    {
        $barangay_id = $request->barangay_id;
        echo $barangay_id;
        echo Input::hasFile('csv_flood');
        if (Input::hasFile('csv_flood')) { 
            
            //get the csv file 
            $handle = fopen(Input::file('csv_flood'),"r"); 
            
            //loop through the csv file and insert into database 
            $data = fgetcsv($handle,1000,",",'"','"');

            while ($data = fgetcsv($handle,1000,",",'"','"'))
            { 
                    if ($data[0] && $data[1]==$barangay_id) { 
                        FloodMap::where('barangay_id', '=', $data[1])->where('level', '=', $data[2])->where('return_period', '=', $data[3])->delete();
                        DB::statement("INSERT INTO flood_maps (barangay_id, level, return_period, shape) VALUES 
                            ( 
                              '".addslashes($data[1])."',
                              '".addslashes($data[2])."',
                              '".addslashes($data[3])."',
                               GeomFromText('".addslashes($data[0])."')
                             
                            ) 
                        ");
                    } 
                }
            }  
            // 
        

        return redirect()->route('barangays.show', $barangay_id)->with('message', 'Successfully Added!');
    }


}

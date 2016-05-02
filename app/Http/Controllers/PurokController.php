<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;

use brisgis\Http\Requests;
use brisgis\Purok;
use brisgis\PurokBoundary;
use brisgis\Barangay;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use narutimateum\Toastr\Facades\Toastr;

class PurokController extends Controller
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
        $barangay_id = $request->barangay_id;
        $inputs = $request->all();
        $purok = Purok::create($inputs);
        Toastr::success('Successfully Added!');

        return redirect()->route('barangays.show', $barangay_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purok_id = Input::get('purok_id');
        $boundary = PurokBoundary::where('purok_id', '=', $purok_id)->first();
        return Response::json($boundary);
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
        $barangay_id = $request->barangay_id;

        $updates = $request->all();
        
        $purok = Purok::find($id);
        $purok = $purok->update($updates);
        Toastr::info('Successfully Updated!');
        
        return redirect()->route('barangays.show', $barangay_id);
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

        $purok = Purok::destroy($id);

        Toastr::error('Successfully Remove!');

        return redirect()->route('barangays.show', $barangay_id);
    }

    public function importBoundary()
    {
        $barangay_id = Input::get('barangay_id');

        if (Input::hasFile('csv_boundary')) { 
            
            //get the csv file 
            $handle = fopen(Input::file('csv_boundary'),"r"); 
            
            //loop through the csv file and insert into database 
            $data = fgetcsv($handle,1000,",",'"','"');

            while ($data = fgetcsv($handle,1000,",",'"','"'))
            { 
                    if ($data[0]) { 
                        PurokBoundary::where('purok_id', '=', $data[1])->delete();
                        DB::statement("INSERT INTO purok_boundaries (purok_id, shape) VALUES 
                            ( 
                              '".addslashes($data[1])."',
                               GeomFromText('".addslashes($data[0])."')
                             
                            ) 
                        "); 
                    } 
                }
            }  
            // 
        
        Toastr::success('Successfully Added!');

        return redirect()->route('barangays.show', $barangay_id);
    }

    public function getPuroks($id)
    {
        $barangay = Barangay::with('puroks')->find($id); 
        
        return Response::json($barangay);
    }
}

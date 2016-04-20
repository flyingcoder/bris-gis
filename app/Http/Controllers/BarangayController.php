<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;

use brisgis\Http\Requests;
use brisgis\Municipality;
use brisgis\Barangay;
use Illuminate\Support\Facades\Input;


class BarangayController extends Controller
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
        $municipality_id = Input::get('municipality_id');
        $barangays = Municipality::with('barangays')->find($municipality_id); 
        
        return $barangays;
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
        $inputs = $request->all();
        $barangay = Barangay::create($inputs);
        
        return $barangay;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangay = Barangay::with('municipality', 'municipality.province', 'puroks', 'floodMaps')->find($id); 
        //dd(Barangay::with('floodMaps')->find($id));
        return $barangay;
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
        
        $barangay = Barangay::find($id);
        $barangay = $barangay->update($updates);
        
        return $barangay;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangay = Barangay::destroy($id);

        return $barangay;
    }
}

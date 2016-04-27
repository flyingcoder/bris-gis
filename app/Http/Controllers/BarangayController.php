<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Barangay;
use brisgis\Municipality;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;



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
        $barangays = Municipality::find($municipality_id)->barangays;

        return Response::json($barangays);
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
        $municipality_id = $request->municipality_id;
        
        $inputs = $request->all();
        $barangay = Barangay::create($inputs);
        
        return redirect()->route('barangays.get', $municipality_id)->with('message', 'Successfully Added!');
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
        $municipality_id = $barangay->municipality->id;
        return view('pages.barangays.show')->with('barangay', $barangay)->with('municipality_id', $municipality_id);
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
        
        return redirect()->route('barangays.show', $id)->with('message', 'Successfully Remove!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $municipality_id = Input::get('municipality_id');
        $barangay = Barangay::destroy($id);

        return redirect()->route('barangays.get', $municipality_id)->with('message', 'Successfully Remove!');
    }
}

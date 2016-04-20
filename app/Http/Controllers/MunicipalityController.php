<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Province;
use brisgis\Municipality;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;


class MunicipalityController extends Controller
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
        $province_id = Input::get('option');
        $municipalities = Province::find($province_id)->municipalities;

        return Response::json($municipalities);
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
        $municipality = Municipality::create($inputs);
        
        return redirect()->route('provinces.show', $request->province_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
        $municipality = Municipality::find($id);
        $municipality = $municipality->update($updates);
        
        return redirect()->route('provinces.show', $request->province_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = Municipality::find($id)->province;
        $municipality = Municipality::destroy($id);

        return redirect()->route('provinces.show', $province->id);;
    }

}

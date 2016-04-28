<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\Province;
use Illuminate\Support\Facades\Response;
use narutimateum\Toastr\Facades\Toastr;

class ProvinceController extends Controller
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
        $provinces = Province::all();

        return view('pages.provinces.index')->with('provinces',$provinces);
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
        $province = Province::create($inputs);
        Toastr::success('Successfully Added!');

        return redirect()->route('provinces.index');
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
        
        $province = Province::find($id);
        $province = $province->update($updates);
        Toastr::info('Successfully Updated!');

        return redirect()->route('provinces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = Province::destroy($id);
        Toastr::error('Successfully Remove!');

        return redirect()->route('provinces.index');
    }

    public function getProvinces()
    {
        return Response::json(Province::all());
    }
    
    public function getMunicipalities($id)
    {
        $province = Province::with('municipalities')->find($id); 
        
        return view('pages.provinces.show')->with('province',$province);
    }

}

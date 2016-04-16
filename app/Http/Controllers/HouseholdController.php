<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;

use brisgis\Http\Requests;

class HouseholdController extends Controller
{
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
/*        $households = (object) array (
            '0' => array 
            ('id' => '1',
            'purok_name' => 'Hinaplanon',
            'household_name' => 'Hernaez Resident',
            'year_constructed' => '1/13/1995',
            'usage' => 'Residential',
            'area' => '25 m sq.'),
            '1' => array 
            ('id' => '1',
            'purok_name' => 'Hinaplanon',
            'household_name' => 'Hernaez Resident',
            'year_constructed' => '1/13/1995',
            'usage' => 'Residential',
            'area' => '25 m sq.')
        );*/

$object = (object) ['property' => 'Here we go'];

    
        dd($object);
        return view('pages.households.index')->with('households', $households);
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
        //
    }
}

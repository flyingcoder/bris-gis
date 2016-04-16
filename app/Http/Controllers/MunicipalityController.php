<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;
use brisgis\Http\Requests;
use brisgis\MunicipalityCRUD;
use brisgis\Repositories\Contracts\MunicipalityRepositoryInterface;
use brisgis\Output\Contracts\MunicipalityShowInterface;
use brisgis\Output\MunicipalityShowJSON;
use Illuminate\Support\Facades\Input;


class MunicipalityController extends Controller
{
    /**
     * @var BarangayRepositoryInterface
     */
    private $repo;
    /**
     * @var BarangayShowInterface
     */
    private $output;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MunicipalityRepositoryInterface $repo, MunicipalityShowInterface $output)
    {
        //$this->middleware('auth');
        $this->repo = $repo;
        $this->output = $output;
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
        $province_id = $request->province_id;
        
        $municipality = new MunicipalityCRUD();
        $municipality->createMunicipality($this->repo, $request, $province_id);
        return redirect()->route('provinces.show', $province_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($province_id)
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
        $province_id = $request->province_id;

        $municipality = new MunicipalityCRUD();
        $municipality->updateMunicipality($this->repo, $request, $province_id, $id);
        return redirect()->route('provinces.show', $province_id);

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

    public function remove($province_id, $municipality_id)
    {
        $municipality = new MunicipalityCRUD();
        $municipality->deleteMunicipality($this->repo, $province_id, $municipality_id);
        return redirect()->route('provinces.show', $province_id);

    }

    public function dropdown()
    {
        $province_id = Input::get('option');
        $municipalities = new MunicipalityCRUD();
        $municipalities->getAllMunicipalities($this->repo, $province_id);
        return $municipalities->showAllMunicipalities(new MunicipalityShowJSON ());

    }
}

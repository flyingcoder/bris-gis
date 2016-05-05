<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;

use brisgis\Http\Requests;
use brisgis\Building;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{
    public function searchHousehold($barangay_id)
    {

        return view('pages.search.search-household');
    }

    public function searchFamily($barangay_id)
    {
        return view('pages.search.search-family');
    }

    public function searchResident($barangay_id)
    {
        return view('pages.search.search-resident');
    }

    public function getHousehold($barangay_id)
    {
        $household_name = Input::get('household_name');
        if($barangay_id == 'all')
        {
        $households = Building::with('purok','purok.barangay', 'purok.barangay.municipality','purok.barangay.municipality.province')
                                ->where('name', 'LIKE', '%'.$household_name.'%')
                                ->get();
        }else
        {
        $households = Building::join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                                ->join('barangays', 'barangays.id', '=', 'puroks.barangay_id')
                                ->join('municipalities', 'municipalities.id', '=', 'barangays.municipality_id')
                                ->join('provinces', 'provinces.id', '=', 'municipalities.province_id')
                                ->where('barangays.id', '=', $barangay_id)
                                ->where('buildings.name', 'LIKE', '%'.$household_name.'%')
                                ->get();       
        }

        return Response::json($households);
    }
}

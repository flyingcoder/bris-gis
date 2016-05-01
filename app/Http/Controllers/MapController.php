<?php

namespace brisgis\Http\Controllers;

use brisgis\Http\Requests;
use Illuminate\Http\Request;
use brisgis\Barangay;
use brisgis\Building;
use brisgis\FloodMap;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.maps.index');
    }

    public function showMaps($barangay_id, $map_type)
    {
        $barangay = Barangay::with('municipality', 'municipality.province')->find($barangay_id);

        if($map_type == 'flood_map')
        {
            return view('pages.maps.flood_maps')->with('barangay', $barangay);

        }else if ($map_type == 'population_map')
        {
            return view('pages.maps.population_map')->with('barangay', $barangay);
        }
    }

    public function getHouseholds($barangay_id)
    {
        $building = Building::join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                                ->join('barangays', 'barangays.id', '=', 'puroks.barangay_id')
                                ->where('barangays.id', '=', $barangay_id)
                                ->select('buildings.id as h_id', 'latitude as lat', 'longitude as lon', 'buildings.name as h_name')
                                ->get();
        return Response::json($building);
    }

    public function getFloodMaps($barangay_id)
    {
        $return_period = Input::get('return_period');
        $flood_map = FloodMap::join('barangays', 'barangays.id', '=', 'flood_maps.barangay_id')
                                ->where('barangays.id', '=', $barangay_id)
                                ->where('flood_maps.return_period', '=', $return_period)
                                ->select(DB::raw('AsText(shape) AS floodmaps_shape'))
                                ->get();
        return Response::json($flood_map);
    }

    public function getPointOnLevel($barangay_id)
    {
        $flood_level = Input::get('flood_level');
        $return_period = Input::get('return_period');
        $flood_map = DB::select("SELECT DISTINCT buildings.purok_id as purok_id, buildings.id as h_id, latitude as lat, longitude as lon, buildings.name as h_name, buildings.building_usage as h_usage, buildings.structure as h_structure
                FROM flood_maps INNER JOIN barangays on flood_maps.barangay_id = barangays.id, 
                residents INNER JOIN family_members on family_members.resident_id = residents.id
                INNER JOIN families on family_members.family_id = families.id
                INNER JOIN buildings on families.building_id = buildings. id 
                WHERE ST_CONTAINS(flood_maps.shape, Point(buildings.longitude, buildings.latitude))
                AND barangays.id = '" . $barangay_id . "'
                AND flood_maps.return_period = '" . $return_period . "'
                AND flood_maps.level = '" . $flood_level . "';");
        return Response::json($flood_map);
    }

    public function getPointOnNotLevel($barangay_id)
    {
        $flood_level = Input::get('flood_level');
        $return_period = Input::get('return_period');
        $flood_map = DB::select("SELECT buildings.id as h_id, latitude as lat, longitude as lon, buildings.name as h_name
            FROM buildings INNER JOIN puroks on buildings.purok_id = puroks.id 
            INNER JOIN barangays on puroks.barangay_id = barangays.id 
            WHERE barangays.id = '" . $barangay_id . "'
            AND buildings.id NOT IN 
            ( SELECT DISTINCT buildings.id as h_id
            FROM flood_maps INNER JOIN barangays on flood_maps.barangay_id = barangays.id, 
            residents INNER JOIN family_members on family_members.resident_id = residents.id
            INNER JOIN families on family_members.family_id = families.id
            INNER JOIN buildings on families.building_id = buildings. id 
            WHERE ST_CONTAINS(flood_maps.shape, Point(buildings.longitude, buildings.latitude))
            AND barangays.id = '" . $barangay_id . "'
            AND flood_maps.return_period = '" . $return_period . "'
            AND flood_maps.level = '" . $flood_level . "' );");
        return Response::json($flood_map);
    }
}

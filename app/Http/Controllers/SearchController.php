<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;

use brisgis\Http\Requests;
use brisgis\Building;
use brisgis\Family;
use brisgis\Resident;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{
    public function searchHousehold($barangay_id)
    {

        return view('pages.search.search-household')->with('barangay_id', $barangay_id);
    }

    public function searchFamily($barangay_id)
    {
        return view('pages.search.search-family')->with('barangay_id', $barangay_id);
    }

    public function searchResident($barangay_id)
    {
        return view('pages.search.search-resident')->with('barangay_id', $barangay_id);
    }

    public function getHousehold($barangay_id)
    {
        $household_name = Input::get('household_name');
        if($barangay_id == 'all')
        {
        $households = Building::join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                                ->join('barangays', 'barangays.id', '=', 'puroks.barangay_id')
                                ->join('municipalities', 'municipalities.id', '=', 'barangays.municipality_id')
                                ->join('provinces', 'provinces.id', '=', 'municipalities.province_id')
                                ->select('buildings.*', 'buildings.name as h_name', 'puroks.name as purok_name', 'puroks.description as description', 'barangays.name as b_name', 'municipalities.name as m_name', 'provinces.name as province_name')
                                ->where('buildings.name', 'LIKE', '%'.$household_name.'%')
                                ->get();
        }else
        {
        $households = Building::join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                                ->join('barangays', 'barangays.id', '=', 'puroks.barangay_id')
                                ->join('municipalities', 'municipalities.id', '=', 'barangays.municipality_id')
                                ->join('provinces', 'provinces.id', '=', 'municipalities.province_id')
                                ->select('buildings.*', 'buildings.name as h_name', 'puroks.name as purok_name', 'puroks.description as description', 'barangays.name as b_name', 'municipalities.name as m_name', 'provinces.name as province_name')
                                ->where('barangays.id', '=', $barangay_id)
                                ->where('buildings.name', 'LIKE', '%'.$household_name.'%')
                                ->get();       
        }

        return Response::json($households);
    }

    public function getFamily($barangay_id)
    {
        $family_name = Input::get('family_name');
        $monthly_income = Input::get('monthly_income');
        $if_4ps = Input::get('if_4ps');
        $income_range = explode("-", $monthly_income);
        if($barangay_id == 'all')
                {
        $family = Family::join('buildings', 'buildings.id', '=', 'families.building_id')
                            ->join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                            ->join('barangays', 'barangays.id', '=', 'puroks.barangay_id')
                            ->select('families.*')
                            ->where('monthly_income', '>', $income_range[0])
                            ->where('monthly_income', '<=', $income_range[1])
                            ->where('if_4ps', 'LIKE', '%'.$if_4ps.'%')
                            ->where ('families.family_identifier', 'LIKE', '%'.$family_name.'%')
                            ->get();
        }else
        {
            $family = Family::join('buildings', 'buildings.id', '=', 'families.building_id')
                            ->join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                            ->join('barangays', 'barangays.id', '=', 'puroks.barangay_id')
                            ->select('families.*')
                            ->where('barangays.id', '=', $barangay_id)
                            ->where('monthly_income', '>', $income_range[0])
                            ->where('monthly_income', '<=', $income_range[1])
                            ->where('if_4ps', 'LIKE', '%'.$if_4ps.'%')
                            ->where ('families.family_identifier', 'LIKE', '%'.$family_name.'%')
                            ->get();
        }

        return Response::json($family);
    }

    public function getResident($barangay_id)
    {
        $gender = Input::get('gender');
        $education = Input::get('education');
        $if_voter = Input::get('if_voter');
        $if_disabled = Input::get('if_disabled');
        $age_range = Input::get('age_range');
        $age = explode("-", $age_range);

        if($barangay_id == 'all')
                {
        $resident = Resident::join('family_members', 'family_members.resident_id', '=', 'residents.id')
                                ->join('families', 'families.id', '=', 'family_members.family_id')
                                ->join('buildings', 'buildings.id', '=', 'families.building_id')
                                ->join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                                ->join('barangays', 'barangays.id', '=', 'puroks.barangay_id')
                                ->select('residents.*', 'buildings.name as h_name', 'puroks.name as p_name', 'puroks.description as description', 'barangays.name as b_name')
                                ->where('gender', 'LIKE', '%'.$gender.'%')
                                ->where('education', 'LIKE', '%'.$education.'%')
                                ->where('if_voter', 'LIKE', '%'.$if_voter.'%')
                                ->where('if_disabled', 'LIKE', '%'.$if_disabled.'%')
                                ->whereRaw('(YEAR(NOW()) - YEAR(residents.birthdate)) > '.$age[0])
                                ->whereRaw('(YEAR(NOW()) - YEAR(residents.birthdate)) <= '.$age[1])
                                ->where(function($q) {
                                    $resident_name = Input::get('resident_name');
                                      $q->where('residents.first_name', 'LIKE', '%'.$resident_name.'%')
                                        ->orwhere('residents.last_name', 'LIKE', '%'.$resident_name.'%');
                                  })
                                ->get();
        }else
        {
            $resident = Resident::join('family_members', 'family_members.resident_id', '=', 'residents.id')
                                ->join('families', 'families.id', '=', 'family_members.family_id')
                                ->join('buildings', 'buildings.id', '=', 'families.building_id')
                                ->join('puroks', 'puroks.id', '=', 'buildings.purok_id')
                                ->join('barangays', 'barangays.id', '=', 'puroks.barangay_id')
                                ->select('residents.*', 'buildings.name as h_name', 'puroks.name as p_name', 'puroks.description as description', 'barangays.name as b_name')
                                ->where('barangays.id', '=', $barangay_id)
                                ->where('gender', 'LIKE', '%'.$gender.'%')
                                ->where('education', 'LIKE', '%'.$education.'%')
                                ->where('if_voter', 'LIKE', '%'.$if_voter.'%')
                                ->where('if_disabled', 'LIKE', '%'.$if_disabled.'%')
                                ->whereRaw('(YEAR(NOW()) - YEAR(residents.birthdate)) > '.$age[0])
                                ->whereRaw('(YEAR(NOW()) - YEAR(residents.birthdate)) <= '.$age[1])
                                ->where(function($q) {
                                    $resident_name = Input::get('resident_name');
                                      $q->where('residents.first_name', 'LIKE', '%'.$resident_name.'%')
                                        ->orwhere('residents.last_name', 'LIKE', '%'.$resident_name.'%');
                                  })
                                ->get();
        }
        return Response::json($resident);
    }
}

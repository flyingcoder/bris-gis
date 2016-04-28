<?php
namespace brisgis\Http\Controllers;
use Illuminate\Http\Request;
use brisgis\Http\Requests;
class PageController extends Controller
{
    public function provinceIndex()
    {
        return view('pages.provinces.index');
    }
    public function userIndex()
    {
        return view('pages.users.index');
    }
    public function barangayOption()
    {
        return view('pages.barangays.option');
    }
    public function buildingOption()
    {
        return view('pages.buildings.option');
    }
    public function mappopuIndex()
    {
        return view('pages.mapspopu.index');
    }
    public function reportOption()
    {
        return view('pages.reports.option');
    }
      public function mapfloodIndex()
    {
        return view('pages.mapsflood.index');
    }
     public function homeIndex()
    {
        return view('pages.home.index');
    }
    public function municipalityIndex()
    {
       return view('pages.provinces.show');
    }
    public function purokIndex()
    {
       return view('pages.barangays.show');
    }
    public function household_detailIndex()
    {
        return view('pages.buildings.household_details.index');
    }
    public function family_profileIndex()
    {
        return view('pages.buildings.family_profiles.index');
    }
    public function resident_profileIndex()
    {
        return view('pages.buildings.resident_profiles.index');
    }
    
    public function householdCreate()
    {
        return view('pages.buildings.create');
    }

    public function householdIndex()
    {
        return view('pages.households.index');
    }

    public function disasterOption()
    {
        return view('pages.disasters.option');
    }

    public function healthOption()
    {
        return view('pages.health.option');
    }
 
}
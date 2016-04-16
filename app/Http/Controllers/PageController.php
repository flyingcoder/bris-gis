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
    public function barangayIndex()
    {
        return view('pages.barangays.index');
    }
    public function householdIndex()
    {
        return view('pages.households.index');
    }
    public function mappopuIndex()
    {
        return view('pages.mapspopu.index');
    }
    public function reportIndex()
    {
        return view('pages.reports.index');
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
        return view('pages.households.household_details.index');
    }
    public function family_profileIndex()
    {
        return view('pages.households.family_profiles.index');
    }
    public function resident_profileIndex()
    {
        return view('pages.households.resident_profiles.index');
    }
    
    public function householdCreate()
    {
        return view('pages.households.create');
    }
}
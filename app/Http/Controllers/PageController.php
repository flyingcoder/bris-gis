<?php
namespace brisgis\Http\Controllers;
use Illuminate\Http\Request;
use brisgis\Http\Requests;
class PageController extends Controller
{

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

    public function reportOption()
    {
        return view('pages.reports.option');
    }

      public function mapsOption()
    {
        return view('pages.maps.option');
    }

     public function homeIndex()
    {
        return view('pages.home.index');
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
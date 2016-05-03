<?php

namespace brisgis\Http\Controllers;

use Illuminate\Http\Request;

use brisgis\Http\Requests;

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
}

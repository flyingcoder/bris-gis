<?php

namespace brisgis\Http\Controllers;

use brisgis\Http\Requests;
use Illuminate\Http\Request;

class ReportController extends Controller
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
        return view('pages.reports.index');
    }

    public function showReports($barangay_id)
    {
        return view('pages.reports.index')->with('barangay_id', $barangay_id);
    }
}

<?php

namespace brisgis\Http\Controllers;

use brisgis\Http\Requests;
use Illuminate\Http\Request;
use brisgis\Building;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;

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
        $data_table = "Buildings";
        $data_column = "structure";

        self::createChart($data_table, $data_column);


        return view('pages.reports.index')->with('barangay_id', $barangay_id);
    }

    public function createChart($data_table, $data_column)
    {

        $data_container = DB::table($data_table)->get();
        $array_column = [];
        foreach ($data_container as $data) {
            array_push($array_column, $data->$data_column);
        }

        $array_count = array_count_values($array_column);

        $datatable = \Lava::DataTable();
        $datatable->addStringColumn($data_column);
        $datatable->addNumberColumn('Number');
        foreach ($array_count as $key => $value) {
            $datatable->addRow([
              $key, $value
            ]);
        }
        $pieChart = \Lava::PieChart('reportChart', $datatable);
        return $datatable;
    }

    public function generateReport()
    {
        $data_table = Input::get('table');
        $data_column = Input::get('column');

        $datatable = self::createChart($data_table, $data_column);

        return Response::json($datatable);

    }

}

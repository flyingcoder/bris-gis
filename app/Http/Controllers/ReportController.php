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
        $this->middleware('auth');
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
              $key, (integer)$value
            ]);
        }
        $pieChart = \Lava::PieChart('reportPieChart', $datatable);
        $barChart = \Lava::BarChart('reportBarChart', $datatable);
        return $datatable;
    }

    public function generateReport()
    {
        $data_table = Input::get('table');
        $data_column = Input::get('column');
        if($data_column == 'age')
        {
         $datatable = self::createChartAge($data_table, $data_column);   
        }
        else if($data_column == 'monthly_income'){
        $datatable = self::createChartIncome($data_table, $data_column);
        } 
        else {
        $datatable = self::createChart($data_table, $data_column);
        }

        return Response::json($datatable);

    }

    public function createChartAge($data_table, $data_column)
    {

        $data_container = DB::select("SELECT SUM(CASE WHEN  (YEAR(NOW()) - YEAR(`birthdate`)) BETWEEN 0 AND 1.5 THEN 1 ELSE 0 END) AS Infants,
        SUM(CASE WHEN (YEAR(NOW()) - YEAR(`birthdate`)) BETWEEN 1.5 AND 3 THEN 1 ELSE 0 END) AS Toddlers,
        SUM(CASE WHEN (YEAR(NOW()) - YEAR(`birthdate`)) BETWEEN 3 AND 6 THEN 1 ELSE 0 END) AS Preschool,
        SUM(CASE WHEN (YEAR(NOW()) - YEAR(`birthdate`)) BETWEEN 6 AND 12 THEN 1 ELSE 0 END) AS Childhood,
        SUM(CASE WHEN (YEAR(NOW()) - YEAR(`birthdate`)) BETWEEN 12 AND 18 THEN 1 ELSE 0 END) AS Adolescence,
        SUM(CASE WHEN (YEAR(NOW()) - YEAR(`birthdate`)) BETWEEN 18 AND 40 THEN 1 ELSE 0 END) AS 'Young Adults',
        SUM(CASE WHEN (YEAR(NOW()) - YEAR(`birthdate`)) BETWEEN 40 AND 65 THEN 1 ELSE 0 END) AS 'Middle Adulthood',
        SUM(CASE WHEN (YEAR(NOW()) - YEAR(`birthdate`)) BETWEEN 65 AND 120 THEN 1 ELSE 0 END) AS Seniors        
        FROM residents;");
        $array_column_head = array('Infants', 'Toddlers', 'Preschool', 'Childhood', 'Adolescence', 'Young Adults', 'Middle Adulthood', 'Seniors');
        

        $datatable = \Lava::DataTable();
        $datatable->addStringColumn($data_column);
        $datatable->addNumberColumn('Number');
            $datatable->addRow([$array_column_head[0] . ":  0 - 1.5 years", (integer)$data_container[0]->$array_column_head[0]]);
            $datatable->addRow([$array_column_head[1] . ": 1.5 - 3 years", (integer)$data_container[0]->$array_column_head[1]]);
            $datatable->addRow([$array_column_head[2] . ": 3 - 6 years", (integer)$data_container[0]->$array_column_head[2]]);
            $datatable->addRow([$array_column_head[3] . ": 6 - 12 years", (integer)$data_container[0]->$array_column_head[3]]);
            $datatable->addRow([$array_column_head[4] . ": 12 - 18 years", (integer)$data_container[0]->$array_column_head[4]]);
            $datatable->addRow([$array_column_head[5] . ": 18 - 40 years", (integer)$data_container[0]->$array_column_head[5]]);
            $datatable->addRow([$array_column_head[6] . ": 40 - 65 years", (integer)$data_container[0]->$array_column_head[6]]);
            $datatable->addRow([$array_column_head[7] . ": 65 years and above", (integer)$data_container[0]->$array_column_head[7]]);

        $pieChart = \Lava::PieChart('reportPieChart', $datatable);
        $barChart = \Lava::BarChart('reportBarChart', $datatable);
        return $datatable;
    }

    public function createChartIncome($data_table, $data_column)
    {

        $data_container = DB::select("SELECT SUM(CASE WHEN  monthly_income BETWEEN 0 AND 7890 THEN 1 ELSE 0 END) AS Poor,
        SUM(CASE WHEN  monthly_income BETWEEN 7890 AND 15780 THEN 1 ELSE 0 END) AS 'Low Income',
        SUM(CASE WHEN  monthly_income BETWEEN 15780 AND 31560 THEN 1 ELSE 0 END) AS 'Low Middle Income',
        SUM(CASE WHEN  monthly_income BETWEEN 31560 AND 78900 THEN 1 ELSE 0 END) AS 'Middle Class',
        SUM(CASE WHEN  monthly_income BETWEEN 78900 AND 118350 THEN 1 ELSE 0 END) AS 'Upper Middle Income',
        SUM(CASE WHEN  monthly_income BETWEEN 118350 AND 157800 THEN 1 ELSE 0 END) AS 'Upper Income',
        SUM(CASE WHEN  monthly_income BETWEEN 157800 AND 10000000 THEN 1 ELSE 0 END) AS 'Rich'
        FROM families;");
        $array_column_head = array('Poor', 'Low Income', 'Low Middle Income', 'Middle Class', 'Upper Middle Income', 'Upper Income', 'Rich');
        

        $datatable = \Lava::DataTable();
        $datatable->addStringColumn($data_column);
        $datatable->addNumberColumn('Number');
            $datatable->addRow([$array_column_head[0] . ": P0 - P7,890", (integer)$data_container[0]->$array_column_head[0]]);
            $datatable->addRow([$array_column_head[1] . ": P7,890 - P15,780", (integer)$data_container[0]->$array_column_head[1]]);
            $datatable->addRow([$array_column_head[2] . ": P15,780 - P31,560", (integer)$data_container[0]->$array_column_head[2]]);
            $datatable->addRow([$array_column_head[3] . ": P31,560 - P78,900", (integer)$data_container[0]->$array_column_head[3]]);
            $datatable->addRow([$array_column_head[4] . ": P78,900 - P118,350", (integer)$data_container[0]->$array_column_head[4]]);
            $datatable->addRow([$array_column_head[5] . ": P118,350 - P157,800", (integer)$data_container[0]->$array_column_head[5]]);
            $datatable->addRow([$array_column_head[6] . ": P157,800 and above", (integer)$data_container[0]->$array_column_head[6]]);

        $pieChart = \Lava::PieChart('reportPieChart', $datatable);
        $barChart = \Lava::BarChart('reportBarChart', $datatable);
        return $datatable;
    }
}

/*SELECT SUM(CASE WHEN  residents.occupation_category = 'none' OR residents.occupation_category = '' THEN 1 ELSE 0 END) AS 'Non-Employeed',
       SUM(CASE WHEN  residents.occupation_category != 'none' OR residents.occupation_category != '' THEN 1 ELSE 0 END) AS 'Employeed'
FROM residents;*/
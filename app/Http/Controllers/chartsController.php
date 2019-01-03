<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Charts;

use App\vehicle;
use App\bill;

use DB;

class chartsController extends Controller
{

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $vehicles = vehicle::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))

        ->get();
        
        $bar_chart = Charts::database($vehicles, 'bar', 'highcharts')

			      ->title("Monthly new Register Vehicles")

			      ->elementLabel("Total Vehicles")

			      ->dimensions(500, 350)

			      ->responsive(false)

                  ->groupByMonth(date('Y'), true);

        $income = bill::where(DB::raw("price"),date('Y'))

        ->get();

        $line_chart = Charts::database($income, 'line', 'highcharts')

			      ->title("Monthly new Register Vehicles")

			      ->elementLabel("Total Vehicles")

			      ->dimensions(500, 350)

			      ->responsive(false)

                  ->groupByMonth(date('Y'), true);

        $staff = bill::where(DB::raw("price"),date('Y'))

        ->get();

        $pie_chart = Charts::database($staff, 'pie', 'highcharts')

			      ->title("Monthly new Register Vehicles")

			      ->elementLabel("Total Vehicles")

			      ->dimensions(500, 350)

			      ->responsive(false)

                  ->groupByMonth(date('Y'), true);

                  

        return view('pages/adminOnlyPages/charts',compact('bar_chart','line_chart','pie_chart'));

    }

}
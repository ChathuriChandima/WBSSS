<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;

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
        /*load vahicle data from database*/
        $v=DB::table('vehicles')
            ->select(
                DB::raw('created_at as created_at'),
                DB::raw('count(*) as number')
            )
            ->groupBy('created_at')
            ->get();
        
        /*createing Chart*/
        $bar_chart = Charts::database($v, 'bar', 'highcharts')

			      ->title("Monthly new Register Vehicles")

			      ->elementLabel("Total Vehicles")

			      ->dimensions(500, 350)

			      ->responsive(false)

                  ->groupByMonth(date('Y'), true);
        
                  $income=DB::select("SELECT sum(totalAmount-discount)
                  as monthlySum
                  FROM bills
                  WHERE YEAR(date) = YEAR(CURDATE())
                  GROUP BY MONTH(date) ORDER by MONTH(date)");
                $i=0;
                $incomeArray=array(0,0,0,0,0,0,0,0,0,0,0,0);
                  foreach($income as $d){
                      $incomeArray[$i]=$d->monthlySum;
                      $i++;
                  }
                  $expenses=DB::select("SELECT sum(price)
                  as monthlySum
                  FROM invoices
                  WHERE YEAR(created_at) = YEAR(CURDATE())
                  GROUP BY MONTH(created_at) ORDER by MONTH(created_at)");
                $j=0;
                $expensesArray=array(0,0,0,0,0,0,0,0,0,0,0,0);
                  foreach($expenses as $d){
                      $d[$j]=$d->monthlySum;
                      $j++;
                  }
                  $profitArray=array();
                  for($i=0;$i<12;$i++){
                    $profitArray[$i]=$incomeArray[$i]-$expensesArray[$i];
                  }

        
                  $label=array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');
    
    /*create line chart for income*/
    $line_chart = Charts::create('line', 'highcharts')
        ->title("Monthly income")
            
        ->labels($label)

	    ->elementLabel("Income")

        ->dimensions(500, 350)

        ->responsive(false)
                  
        ->values($incomeArray);

    /*create line chart for expenses*/
    $line_chart2 = Charts::create('line', 'highcharts')
        ->title("Monthly expenses")
                                        
        ->labels($label)
                        
        ->elementLabel("expenses")                
    
        ->dimensions(500, 350)
                        
        ->responsive(false)
                                        
        ->values($expensesArray);   
                  
    /*create line chart for profit*/
    $line_chart3 = Charts::create('line', 'highcharts')
        ->title("Monthly profit")
                 
        ->labels($label)
 
        ->elementLabel("profit")
 
        ->dimensions(500, 350)
 
        ->responsive(false)
                   
        ->values($profitArray);
        
        /*load charts to the charts blade*/
        return view('pages/adminOnlyPages/charts',compact('line_chart','line_chart2','line_chart3','bar_chart'));
    }

}

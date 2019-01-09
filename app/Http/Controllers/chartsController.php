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

        /*load all income for month from bills table*/
         $jant=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-01-01' AND '2019-01-31'");
         $febt=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-02-01' AND '2019-02-28'");
         $mart=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-03-01' AND '2019-03-31'");
         $aprt=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-04-01' AND '2019-04-30'");
         $mayt=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-05-01' AND '2019-05-31'");
         $junt=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-06-01' AND '2019-06-30'");
         $jult=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-07-01' AND '2019-07-31'");
         $augt=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-08-01' AND '2019-08-31'");
         $sept=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-09-01' AND '2019-09-30'");
         $octt=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-10-01' AND '2019-10-31'");
         $novt=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-11-01' AND '2019-11-30'");
         $dect=DB::select("select sum(totalAmount-discount) as monthlySum from bills where DATE(date) BETWEEN '2019-12-01' AND '2019-12-31'");

        
        /*load all expenses for month from invoices table*/
         $jani=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-01-01' AND '2019-01-31'");
         $febi=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-02-01' AND '2019-02-28'");
         $mari=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-03-01' AND '2019-03-31'");
         $apri=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-04-01' AND '2019-04-30'");
         $mayi=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-05-01' AND '2019-05-31'");
         $juni=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-06-01' AND '2019-06-30'");
         $juli=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-07-01' AND '2019-07-31'");
         $augi=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-08-01' AND '2019-08-31'");
         $sepi=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-09-01' AND '2019-09-30'");
         $octi=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-10-01' AND '2019-10-31'");
         $novi=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-11-01' AND '2019-11-30'");
         $deci=DB::select("select sum(price) as monthlySum from invoices where DATE(created_at) BETWEEN '2019-12-01' AND '2019-12-31'");

         /*store income in an array month wise*/
         $incomeArray=array($jant[0]->monthlySum,$febt[0]->monthlySum,$mart[0]->monthlySum,$aprt[0]->monthlySum,$mayt[0]->monthlySum,$junt[0]->monthlySum,$jult[0]->monthlySum,$augt[0]->monthlySum,$sept[0]->monthlySum,$octt[0]->monthlySum,$novt[0]->monthlySum,$dect[0]->monthlySum);
         
         /*store expenses in an array month wise*/
         $expensesArray=array($jani[0]->monthlySum,$febi[0]->monthlySum,$mari[0]->monthlySum,$apri[0]->monthlySum,$mayi[0]->monthlySum,$juni[0]->monthlySum,$juli[0]->monthlySum,$augi[0]->monthlySum,$sepi[0]->monthlySum,$octi[0]->monthlySum,$novi[0]->monthlySum,$deci[0]->monthlySum);
        
         /*create two empty arrays to store data in incomeArray & expenses array avoiding null values*/
        $incomeArray2=array();
        $expensesArray2=array();

        /*create empty array to store monthly profit*/
        $profit=array();

        /*lables of x-axis for line charts*/
        $label=array('jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec');
        for($i=0;$i<12;$i++){
            if($incomeArray[$i]==null){
                /*set income as 0 for month with zero bills*/
                $incomeArray2[$i]=0;
            }
            else{
                $incomeArray2[$i]=$incomeArray[$i];
            }
            if($expensesArray[$i]==null){
                /*set expenses as 0 for month with zero invoices*/
                $expensesArray2[$i]=0;
            }
            else{
                $expensesArray2[$i]=$incomeArray[$i];
            }
            
            /*calculate profit for the months*/
            $profit[$i]=$incomeArray2[$i]-$expensesArray2[$i];
                
        }
    
    /*create line chart for income*/
    $line_chart = Charts::create('line', 'highcharts')
        ->title("Monthly income")
            
        ->labels($label)

	    ->elementLabel("Income")

        ->dimensions(500, 350)

        ->responsive(false)
                  
        ->values($incomeArray2);

    /*create line chart for expenses*/
    $line_chart2 = Charts::create('line', 'highcharts')
        ->title("Monthly expenses")
                                        
        ->labels($label)
                        
        ->elementLabel("expenses")                
    
        ->dimensions(500, 350)
                        
        ->responsive(false)
                                        
        ->values($expensesArray2);   
                  
    /*create line chart for profit*/
    $line_chart3 = Charts::create('line', 'highcharts')
        ->title("Monthly profit")
                 
        ->labels($label)
 
        ->elementLabel("profit")
 
        ->dimensions(500, 350)
 
        ->responsive(false)
                   
        ->values($profit);
        
        /*load charts to the charts blade*/
        return view('pages/adminOnlyPages/charts',compact('line_chart','line_chart2','line_chart3','bar_chart'));
    }

}

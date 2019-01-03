<?php

namespace App\Http\Controllers;
use App\stock;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use charts\Carbonmaster\src\Carbon\Carbon;
use charts\lavacharts\src\Lavacharts;

$lava = new \Khill\Lavacharts\Lavacharts;

class testController extends Controller
{
    use Khill\Lavacharts\Lavacharts;

    $lava->with('Lava::');

$population = $lava->DataTable();

$population->addDateColumn('Year')
           ->addNumberColumn('Number of People')
           ->addRow(['2006', 623452])
           ->addRow(['2007', 685034])
           ->addRow(['2008', 716845])
           ->addRow(['2009', 757254])
           ->addRow(['2010', 778034])
           ->addRow(['2011', 792353])
           ->addRow(['2012', 839657])
           ->addRow(['2013', 842367])
           ->addRow(['2014', 873490]);

$lava->AreaChart('Population', $population, [
    'title' => 'Population Growth',
    'legend' => [
        'position' => 'in'
    ]
]);

    public function test()
    {
        return view('test');
    }
}

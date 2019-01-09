<?php

namespace App\Http\Controllers;
use App\bill;
use App\vehicle;
use App\Customer;
use App\User;
use App\Service;
use Alert;
use DB;
use PDF;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

class billController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.bill.bills')
        ->with('bill',bill::all());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $l= DB::table('bills')->latest()->first();
        // Added a condition deal when the db is empty
        if ($l != null){
          $n=substr($l->billNo,1);
        }else{
          $n = '0';
        }
        $i=(int)$n;
        $j=++$i;
        $h=(string)$j;
        $d=strlen($h);
        if($d==1){
            $id='B0000'.$h;
        }elseif($d==2){
            $id='B000'.$h;
        }elseif($d==3){
            $id='B00'.$h;
        }elseif($d==4){
            $id='B0'.$h;
        }else{
            $id='B'.$h;
        }


        return view('pages.bill.addBill')
        ->with('id',$id)->with('vehicle',vehicle::all())->with('customer',Customer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'billNo' => 'required',
            'date' => 'required',
            'vehicleNo' => 'required',
        ]);
        // Getting the unbilled services of the vehicles
        $vehicleNo = $request->input('vehicleNo');
        $services = Service::where('vehicleNo','=',$vehicleNo)->get();
        $totalAmount = 0;
        $discount = 0;
        foreach ($services as $service) {
          if ($service->isBilled == 0){
            $totalAmount += $service->totalAmount;
            $discount += $service->discount;
            $service->isBilled = 1;
            $service->save();
          }
        }
        if ($totalAmount == 0){
          Alert::success('Nothing to Bill.','Done!');
        }else{

          $bill=new bill;
          $bill->billNo=$request->input('billNo');
          $bill->date=date('Y-m-d',strtotime($request->input('date')));
          $vehicle = vehicle::where('vehicleNo','=',$vehicleNo)->first();
          $customer = User::find($vehicle->cId);
          $bill->customerName = $customer->name;
          $bill->vehicleNo= $vehicleNo;
          $bill->totalAmount= $totalAmount;
          $bill->discount= $discount;
          $bill->save();
          Alert::success("Bill details are saved.",'Done!');
        }
            return redirect('/bills');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'billNo' => 'required',
            'date' => 'required',
            'vehicleNo' => 'required',
        ]);
        // Getting the unbilled services of the vehicles
        $vehicleNo = $request->input('vehicleNo');
        $services = Service::where('vehicleNo','=',$vehicleNo)->get();
        $totalAmount = 0;
        $discount = 0;
        foreach ($services as $service) {
          if ($service->isBilled == 0){
            $totalAmount += $service->totalAmount;
            $discount += $service->discount;
            $service->isBilled = 1;
            $service->save();
          }
        }
        if ($totalAmount == 0){
          Alert::success('Nothing to Bill.','Done!');
        }else{

          $bill=new bill;
          $bill->billNo=$request->input('billNo');
          $bill->date=date('Y-m-d',strtotime($request->input('date')));
          $vehicle = vehicle::where('vehicleNo','=',$vehicleNo)->first();
          $customer = User::find($vehicle->cId);
          $bill->customerName = $customer->name;
          $bill->vehicleNo= $vehicleNo;
          $bill->totalAmount= $totalAmount;
          $bill->discount= $discount;
          $bill->save();
        }
        
            Alert::success('Your bill details are edited.','Done!');
            return redirect('/bills');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $b=bill::find($id);
        $b->delete();
        Alert::success('Deleted successfully.','Done!');
        return redirect('/bills');
    }
    public function find($id){
        $b=bill::find($id);
        return view('pages.bill.editbill')
        ->with('bill',$b);
    }
    public function print($id){
        $b=bill::find($id);
        return view('pages.bill.printbill')
        ->with('bill',$b);
    }

    public function search(){
        $q=Input::get('q');
        $bill=bill::where('billNo','LIKE','%'.$q.'%')->orWhere('customerName','LIKE','%'.$q.'%')->orWhere('vehicleNo','LIKE','%'.$q.'%')->get();
        if(count($bill)>0){
            return view('pages.bill.searchbill')->withDetails($bill);
        }else{
            Alert::info('Try to search Again.....','Not Found!');
            return redirect('/bills');
        }
    }
    public function downloadPdf(){
        $pdf = PDF::loadview('pages.bill.printbill');
        return $pdf->download('Mybill.pdf');
    }
}

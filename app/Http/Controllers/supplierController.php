<?php

namespace App\Http\Controllers;
use App\Supplier;
use DB;
use Alert;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $l= DB::table('suppliers')->latest()->first();
          if ($l != null){
            $n=substr($l->supplierId,3);
          }else{
            $n = '1';
          }
            $i=(int)$n;
            $j=++$i;
            $h=(string)$j;
            $d=strlen($h);
            if($d==1){
                $id='SUP00'.$h;
            }elseif($d==2){
                $id='SUP0'.$h;
            }else{
                $id='SUP'.$h;
            }
            return view('pages.accountant.supplier')->with('id',$id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address'=>'required',
            'contactNo'=> 'required|regex:/(0)[0-9]{9}/',
            ]);

            $supplier=new Supplier;
            $supplier->supplierId=$request->input('id');
            $supplier->supplierName=$request->input('name');
            $supplier->address=$request->input('address');
            $supplier->contactNo=$request->input('contactNo');
            $supplier->email=$request->input('email');
            $supplier->save();
            Alert::success('Supplier details inserted.','Done!');
            return redirect('/invoice');
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
    }

    public function search(){
        $q=Input::get('q');
        $vehicle=vehicle::where('vehicleNo','LIKE','%'.$q.'%')->get();
        $user=Customer::where('name','LIKE','%'.$q.'%')->get();
        if(count($vehicle)>0){
            return view('pages.vehicle.search')->withDetails($vehicle)->with('c',1 )
            ->with('customer',Customer::all());
        }elseif(count($user)>0){
            $vehicle1=vehicle::all();
            $count=0;
            foreach ($user as $u){
                foreach($vehicle1 as $v){
                    if($u->Id==$v->cId){
                        $count++;
                    }
                }
            }
            if($count>0){
            return view('pages.vehicle.search')->withDetails($user)->with('c',0 )
            ->with('vehicle',vehicle::all());
            }else{
                Alert::info('Try to search Again.....','Not Found!');
                return redirect('vehicles');
            }
        }else{
            Alert::info('Try to search Again.....','Not Found!');
            return redirect('vehicles');
        }
    }
}

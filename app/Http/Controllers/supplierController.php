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
            $n=substr($l->supplierId,3);
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
}

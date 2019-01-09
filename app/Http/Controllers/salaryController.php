<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \Validator;

class salaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary=DB::select('select * from salaryDetail');

        return view('/pages/adminOnlyPages/salary')->with('salary',$salary);
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
        //
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
       
            $salaryDetail=DB::select("select * from salaryDetail where type='$id'");
            return view('/pages/adminOnlyPages/editSalary')->with('salaryDetail',$salaryDetail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'type'=>'required',
            'salary'=>'required|niumeric|min:0'
        ]);
            
            $type=$request->input('type');
            $salary=$request->input('salary');
            DB::update("update salaryDetail set salary = '$salary' where type = '$type'");
            
            return redirect('salary');
    }
    
    public function paySalary(){
        $staff=DB::select('select name from staff');
        return view('/pages/adminOnlyPages/paySalary')->with('staff',$staff);
    }

  
}

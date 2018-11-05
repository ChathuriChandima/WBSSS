<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\vehicle;
use Alert;
use Illuminate\Support\Facades\Auth;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        'address'=>'required',
        'contactNo'=> 'required|regex:/(0)[0-9]{9}/',
        ]);

        $customer=new Customer;
        $customer->Id=$request->input('id');
        $customer->name=$request->input('name');
        $customer->address=$request->input('address');
        $customer->contactNo=$request->input('contactNo');
        $customer->email=$request->input('email');
        $customer->save();
        Alert::success('Your details inserted.','Done!');
        return redirect('/h');
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
        $customer=Customer::find($id);
        return view('pages.customer.personal');
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
        $this->validate($request,[

            'address'=>'required',
            'contactNo'=> 'required|regex:/(0)[0-9]{9}/',
            ]);
    
            $customer=Customer::find($id);
            $customer->address=$request->input('address');
            $customer->contactNo=$request->input('contactNo');
            $customer->save();
            Alert::success('Your changes are saved.','Done!');
            return redirect('profile');
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

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(){
        return view('pages.customer.profile')
        ->with('customer',Customer::find(Auth::user()->id))
        ->with('vehicle',vehicle::where('cId',Auth::user()->id)->first());
        
    }
    public function editable(){
        return view('pages.customer.personal')
        ->with('customer',Customer::find(Auth::user()->id));
    }
}

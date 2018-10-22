<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\vehicle;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
class vehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = vehicle::orderBy('vehicleNo','type','lastServiceDay','brand')->paginate(5);
        return view('vehicle.vehicles',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function move(){
        return view('pages.vehicle.vehicles')
        ->with('vehicle',vehicle::all())
        ->with('customer',Customer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vehicle.add')
        ->with('customer',Customer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'vehicleNo' => 'required',
            'type' =>'required',
            'lastServiceDay'=>'required',
            'brand' => 'required',
            'cId'=>'required'
        ]);
        $vehicle=new vehicle;
        $vehicle->vehicleNo=$request->input('vehicleNo');
        $vehicle->type=$request->input('type');
        $vehicle->lastServiceDay=$request->input('lastServiceDay');
        $vehicle->brand=$request->input('brand');
        $vehicle->cId=$request->input('cId');
        $vehicle->save();

        return redirect('vehicles')->with('success','Your changes are saved.');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.vehicle.show')
        ->with('vehicle',vehicle::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($vehicleNo)
    {
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        $vehicle=vehicle::find($id);
    }
    
}

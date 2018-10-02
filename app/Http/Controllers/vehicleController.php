<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use app\vehicle;

class vehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = vehicle::orderBy('vehicleNo','type','description','brand')->paginate(5);
        return view('vehicle.vehicles',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function move(){
        return view('pages.vehicle.vehicles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.vehicle.create');
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
            'description' =>'required',
            'brand' => 'required'
        ]);


        vehicle::create($request->all());

        return redirect()->route('pages.vehicle.vehicles')
                        ->with('success','Vehicle added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = vehicle::find($id);
        return view('pages.vehicle.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = vehicle::find($id);
        return view('pages.vehicle.edit',compact('item'));
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
        $this->validate($request, [
            'vehicleNo' => 'required',
            
        ]);

        vehicle::find($id)->update($request->all());

        return redirect()->route('pages.vehicle.vehicles')
                        ->with('success','Vehicle Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        vehicle::find($id)->delete();
        return redirect()->route('pages.vehicle.vehicles')
                        ->with('success','Vehicle deleted successfully');
    }
    
}

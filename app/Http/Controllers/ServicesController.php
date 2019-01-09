<?php

namespace App\Http\Controllers;
use App\Service;
use DB;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //link to service page
        return view('pages.accountant.services')
        ->with('service',service::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $l= DB::table('services')->latest()->first();
        // Here a error comes when the db is empty so adding a condition
        if ($l != null){
            $n=substr($l->sid,3);
        }else{
            $n = '0'; //This will prevent a error if the db is empty
        }
        $i=(int)$n;
        $j=++$i;
        $h=(string)$j;
        $d=strlen($h);
        if($d==1){
            $id='SER00'.$h;
        }elseif($d==2){
            $id='SER0'.$h;
        }else{
            $id='SER'.$h;
        }


        return view('pages.accountant.addService')
        ->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'sid' => 'required',
            'name' => 'required|unique:services',
            'partsCost' =>'required',
            'serviceCharge' =>'required',
            'totalAmount' =>'required',
            'discount'=>'required',
        ]);
        //new service object 
        $service=new Service;
        $service->sid=$request->input('sid');
        $service->name=$request->input('name');
        $service->partsCost=$request->input('partsCost');
        $service->serviceCharge=$request->input('serviceCharge');
        $service->totalAmount=$request->input('totalAmount');
        $service->discount=$request->input('discount');
        $service->isBilled=false;
        $service->save();
        Alert::success('Your changes are saved.','Done!');
            return redirect('/services');
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
        //validation
        $this->validate($request, [
            'sid' => 'required',
            'name' => 'required',
            'partsCost' =>'required',
            'serviceCharge' =>'required',
            'totalAmount' =>'required',
            'discount'=>'required',
        ]);
            $service=Service::find($id);
            $service->sid=$request->input('sid');
            $service->name=$request->input('name');
            $service->partsCost=$request->input('partsCost');
            $service->serviceCharge=$request->input('serviceCharge');
            $service->totalAmount=$request->input('totalAmount');
            $service->discount=$request->input('discount');
            $service->save();
            Alert::success('Your changes are saved.','Done!');
            return redirect('/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s=Service::find($id);
        $s->delete();
        Alert::success('Deleted successfully.','Done!');
        return redirect('/services');
    }

    public function find($id){
        $s=Service::find($id);
        return view('pages.accountant.editService')
        ->with('service',$s);
    }

    public function search(){
        $q=Input::get('q');
        //using service code or service name
        $service=Service::where('sid','LIKE','%'.$q.'%')->orWhere('name','LIKE','%'.$q.'%')->get();
        if(count($service)>0){
            return view('pages.accountant.searchservice')->withDetails($service);
        }else{
            Alert::info('Try to search Again.....','Not Found!');
            return redirect('/services');
        }
    }
}

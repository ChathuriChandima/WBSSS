<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use App\vehicle;
use App\User;
use Alert;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SingleUser;
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
        ->with('customer',Customer::all())
        ->with('c',null);
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
        $vehicle->lastServiceDay=date('Y-m-d',strtotime($request->input('lastServiceDay')));
        $vehicle->brand=$request->input('brand');
        $vehicle->cId=$request->input('cId');
        $vehicle->status=$request->input('status');
        $vehicle->save();
        Alert::success('Your changes are saved.','Done!');
        return redirect('vehicles');


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
     * *@param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $this->validate($request, [
            'status'=>'required'
        ]);
            $vehicle=vehicle::find($id);
            $vehicle->status=$request->input('status');
            $vehicle->save();
            Alert::success('Your changes are saved.','Done!');
            if ($vehicle->status == '2'){
              $this->searviceFinishNotifier($vehicle);
            }
            return redirect('vehicles');
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
            'lastServiceDay'=>'required',
            'cId'=>'required'
        ]);
            $vehicle=vehicle::find($id);
            $vehicle->lastServiceDay=date('Y-m-d',strtotime($request->input('lastServiceDay')));
            $vehicle->cId=$request->input('cId');
            $vehicle->status=$request->input('status');
            $vehicle->save();
            Alert::success('Your changes are saved.','Done!');
            // Notifying user if service Finished
            if ($vehicle->status == '2'){
              searviceFinishNotifier($vehicle);
            }
            return redirect('vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $v=vehicle::find($id);
        $v->delete();
        Alert::success('Deleted successfully.','Done!');
        return redirect('vehicles');
    }

    public function find($id)
    {
        $v=vehicle::find($id);
        return view('pages.vehicle.edit')
        ->with('customer',Customer::all())
        ->with('vehicle',$v);
    }
    public function search(){
        $q=Input::get('q');
        $vehicle=vehicle::where('vehicleNo','LIKE','%'.$q.'%')->get();
        $user=Customer::where('name','LIKE','%'.$q.'%')->get();
        if(count($vehicle)>0){
            return view('pages.vehicle.search')->withDetails($vehicle)->with('c',1 )
            ->with('customer',Customer::all());
        }elseif(count($user)>0){
            $vehicle=vehicle::all();
            $count=0;
            foreach ($user as $u){
                foreach($vehicle as $v){
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

    public function myVehicals(){
      // Getting the id of the costumer
      if (Auth::check()){
        $cid = Auth::user()->id;
        $vehicles = vehicle::where('cId',$cid)->get();
        return view('pages.vehicle.myVehicles')
        ->with('vehicle',$vehicles);
      }
    }

    public function searviceFinishNotifier($vehicle){
      // Getting the user to notify
      $user = User::find($vehicle->cId);

      // Creating the subject and the msg of the Notification
      $subject = "One of your Vehicle service Finished!";
      $msg = "Your Vehicle with No. $vehicle->vehicleNo has been finished servicing.";
      // Nofifying the User
      $user->notify(new SingleUser($subject,$msg));
    }
}

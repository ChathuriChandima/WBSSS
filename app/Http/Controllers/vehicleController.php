<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use App\vehicle;
use App\stock;
use App\Service;
use App\User;
use Alert;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use \Validator;
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
        //view vehicle page
        $items = vehicle::orderBy('vehicleNo','type','lastServiceDay','brand')->paginate(5);
        return view('vehicle.vehicles',compact('items'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function move(){

        //pass variables to vehicles page
        return view('pages.vehicle.vehicles')
        ->with('vehicle',vehicle::all())
        ->with('customer',Customer::all())
        ->with('stockNames',stock::all())
        ->with('c',null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //vehicle adding page view
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
        //add new vehicle

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

        // variables
        $partsCost = 0;


        $vehicle=vehicle::find($id);
        $vehicle->status=$request->input('status');
        $vehicle->save();
        Alert::success('Your changes are saved.','Done!');
        if ($vehicle->status == '2'){
          // updateting stocks by iterating on $items
          $noOfStockItems = (int)$request->input('count');
          $stockNames = array();
          $stockQuntity = array();
          for ($i = 0; $i < $noOfStockItems; $i++){
            array_push($stockNames,$request->input('stock')["$i"]['name']);
            array_push($stockQuntity,$request->input('stock')["$i"]['qun']);
          }
          for ($i = 0; $i < count($stockNames); $i++){
            $item = stock::where('name','=',$stockNames[$i])->first();
            $item->availableStock = $item->availableStock - $stockQuntity[$i];
            $item->soldStock = $item->soldStock + $stockQuntity[$i];
            $partsCost += $item->price*(int)$stockQuntity[$i];
            if ($item->availableStock < 20){
              $admins = User::where('role','=','admin')->get();
              $sub = "Running out of Stock";
              $ms = "Only $item->availableStock units of $item->name are left in Stocks!";
              $notification = new SingleUser($sub,$ms);
              foreach ($admins as $admin) {
                $admin.notify($notification);
              }
            }
            $item->save();
          }
          // Creating the service object and saving in Database
          $l= DB::table('services')->latest()->first();
          // Here a error comes when the db is empty so adding a condition
          if ($l != null){
              $n=substr($l->sid,2);
          }else{
              $n = '0'; //This will prevent a error if the db is empty
          }
          $i=(int)$n;
          $j=++$i;
          $h=(string)$j;
          $d=strlen($h);
          if($d==1){
              $id='SE00'.$h;
          }elseif($d==2){
              $id='SE0'.$h;
          }else{
              $id='SE'.$h;
          }
          $service = new Service;
          $service->sid = $id;
          $service->name = $request->input('sname');
          $service->partsCost = $partsCost;
          $service->serviceCharge = $request->input('serviceCharge');
          $service->totalAmount = $service->serviceCharge + $service->partsCost;
          $service->discount = $request->input('discount');
          $service->vehicleNo = $vehicle->vehicleNo;
          $service->isBilled = '0';
          $service->save();
          // Notifying the customer as there service finished
          // Getting the user to notify
          $user = User::find($vehicle->cId);

          // Creating the subject and the msg of the Notification
          $subject = "One of your Vehicle service Finished!";
          $msg = "Your Vehicle with No. $vehicle->vehicleNo has been finished servicing.";
          // Nofifying the User
          $user->notify(new SingleUser($subject,$msg));
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
        //update the vehicle details
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
              // searviceFinishNotifier($vehicle);
              // Getting the user to notify
              $user = User::find($vehicle->cId);

              // Creating the subject and the msg of the Notification
              $subject = "One of your Vehicle service Finished!";
              $msg = "Your Vehicle with No. $vehicle->vehicleNo has been finished servicing.";
              // Nofifying the User
              $user->notify(new SingleUser($subject,$msg));
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
        //delete vehicle
        $v=vehicle::find($id);
        $v->delete();
        Alert::success('Deleted successfully.','Done!');
        return redirect('vehicles');
    }

    public function find($id)
    {
        //edit view
        $v=vehicle::find($id);
        return view('pages.vehicle.edit')
        ->with('customer',Customer::all())
        ->with('vehicle',$v);
    }
    public function search(){
        //search function
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

    public function myVehicles(){
      // Getting the id of the customer
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

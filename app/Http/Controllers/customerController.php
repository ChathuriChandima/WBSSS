<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\vehicle;
use Alert;
use Image;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SingleUser;


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
    public function create(Request $request)
    {
        $this->validate($request,[

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address'=>'required',
            'contactNo'=> 'required|regex:/(0)[0-9]{9}/',
            ]);
            $l= DB::table('users')->latest()->first();
            $m=$l->id;
            $n=$m+1;
            $password=$request->input('name').'@rajaan';
            $user=new User;
            $user->Id=$n;
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->password=Hash::make($password);
            $user->role='customer';
            $user->save();

            $customer=new Customer;
            $customer->Id=$n;
            $customer->name=$request->input('name');
            $customer->address=$request->input('address');
            $customer->contactNo=$request->input('contactNo');
            $customer->email=$request->input('email');
            $customer->save();
            $this->userNotifier();
            Alert::success('Your details inserted.','Done!');
            return redirect('/add_vehicle');


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
        return redirect('/loggedin');
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
            'name'=>'required',
            'email'=>'required|unique:users',
            'address'=>'required',
            'contactNo'=> 'required|regex:/(0)[0-9]{9}/',
            ]);
            $user=User::find($id);
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->save();

            $customer=Customer::find($id);
            $customer->name=$request->input('name');
            $customer->email=$request->input('email');
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


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view(){
        return view('pages.customer.profile')
        ->with('customer',Customer::find(Auth::user()->id))
        ->with('vehicle',vehicle::all())
        ->with('user',Auth::user())
        ->with('i',0);

    }
    public function editable(){
        return view('pages.customer.personal')
        ->with('customer',Customer::find(Auth::user()->id));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change(Request $request){

        if($request->hasFile('pic')){

            $pic = $request->file('pic');
            $filename = time().'.'.$pic->getClientOriginalExtension();
            Image::make($pic)->resize(200, 200)->save( public_path('img\\'. $filename));

            $user=Auth::user();
            $user->pic=$filename;
            $user->save();
            Alert::success('Your profile picture is updated!','Done!');
        }

        return redirect('profile');
    }

    public function user(){
        return view('pages.customer.user');
    }

    public function move(){
        return view('pages.adminOnlyPages.customer')
        ->with('customer',Customer::all())
        ->with('c',null);
    }

    public function find($id)
    {
        $cu=Customer::find($id);
        return view('pages.adminOnlyPages.customerEdit')
        /*->with('customer',Customer::all())*/
        ->with('customer',$cu);
    }

    public function destroy($id)
    {

        $v=User::find($id);
        if($v!=null){//checking is user exist for Id
            $v->delete();
        }
        $c=Customer::find($id);
        if($c!=null){//checking is customer exist for Id
            $c->delete();
        }
        Alert::success('Deleted successfully.','Done!');
        return redirect('customers');
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateCustomer(Request $request)
    {
        $this->validate($request, [
            'Id'=>'required',
            'email'=>'required'
        ]);
            $customer=Customer::find($request->input('Id'));
            $customer->Id=$request->input('Id');
            $customer->name=$request->input('name');
            $customer->address=$request->input('address');
            $customer->contactNo=$request->input('contactNo');
            $customer->email=$request->input('email');
            $customer->save();
            Alert::success('Your changes are saved.','Done!');
            return redirect('customers');
    }


    public function addCustomer()
    {
        return view('pages.adminOnlyPages.addCustomer');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCustomer(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'address' =>'required',
            'contactNo'=>'required',
            'email' => 'required',

        ]);
        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->role='customer';
        $user->save();

        $customer=new Customer;
        $customer->Id=$user->id;
        $customer->name=$request->input('name');
        $customer->address=$request->input('address');
        $customer->contactNo=$request->input('contactNo');
        $customer->email=$request->input('email');
        $customer->save();
        Alert::success('Your changes are saved.','Done!');
        return redirect('customers');


    }

    public function search(){
        $q=Input::get('q');
        $customer=Customer::where('Id','LIKE',$q)->get();
        $user=Customer::where('name','LIKE','%'.$q.'%')->get();
        if(count($customer)>0){
            return view('pages.adminOnlyPages.search')->withDetails($customer)->with('c',1 )
            ->with('customer',Customer::all());
        }elseif(count($user)>0){
            return view('pages.adminOnlyPages.search')->withDetails($user)->with('c',0 )
            ->with('customer',Customer::all());
            }else{
                Alert::info('Try to search Again.....','Not Found!');
                return redirect('customers');
        }
    }

    public function changePasswordForm()
    {
      return view('pages.customer.changePassword')->with('$user',Auth::user());
    }

    public function changePassword(Request $request)
    {
      $this->validate($request, [
        'currentPassword'=>'min:6',
        'newPassword' => 'min:6',
        'verifyPassword' => 'same:newPassword'
      ]);
      $user = Auth::user();
      if (Hash::check($request->input('currentPassword'),$user->password) ) {
        $user->password = Hash::make($request->input('newPassword'));
        $user->save();
        Alert::success("Password Changed !!!");
        return redirect('profile');
      }else{
        $request->session()->flash('warning', "The Password you entered is Incorrect !!!");
        return redirect('change_password');
      }
    }

    public function userNotifier(){
        // Getting the user to notify
        $u= DB::table('users')->latest()->first();
        $user = User::find($u->id);
  
        // Creating the subject and the msg of the Notification
        $subject = "You are registered customer in Rajaan Motors!";
        $msg = "Your Password is '$user->name@rajaan' and your username is your email";
        // Nofifying the User
        $user->notify(new SingleUser($subject,$msg));
      }

}

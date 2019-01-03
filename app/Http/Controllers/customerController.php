<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use App\vehicle;
use Alert;
use Image;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            $password=$request->input('name').'@raajan';
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
        $cu=customer::find($id);
        return view('pages.adminOnlyPages.customerEdit')
        /*->with('customer',Customer::all())*/
        ->with('customer',$cu);
    }

    public function destroy($id)
    {

        $v=User::find($id);
        $v->delete();
        $v=Customer::find($id);
        $v->delete();
        Alert::success('Deleted successfully.','Done!');
        return redirect('customers');
    }

}

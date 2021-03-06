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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //validation
        $this->validate($request,[

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address'=>'required',
            'contactNo'=> 'required|regex:/(0)[0-9]{9}/',
            ]);
            $last= DB::table('users')->latest()->first();
            if ($last != null){
              $lastId=$last->id;
            }
            else{
              $lastId = 0;
            }
            $newId=$lastId+1;
            $password=$request->input('name').'@rajaan';
            //create new user object
            $user=new User;
            $user->Id=$newId;
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->password=Hash::make($password);
            $user->role='customer';
            $user->save();
            //create new customer object
            $customer=new Customer;
            $customer->Id=$newId;
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
        //validation
        $this->validate($request,[

        'address'=>'required',
        'contactNo'=> 'required|regex:/(0)[0-9]{9}/',
        ]);
        //create new customer object
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
        //validaation
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
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




     // load the profile view of the customer
    public function view(){
        return view('pages.customer.profile')
        ->with('customer',Customer::find(Auth::user()->id))
        ->with('vehicle',vehicle::all())
        ->with('user',Auth::user())
        ->with('i',0);

    }
    // load the edit personal data view
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
        //get the file name
        if($request->hasFile('pic')){

            $pic = $request->file('pic');
            $filename = time().'.'.$pic->getClientOriginalExtension();
            //save image in img folder
            Image::make($pic)->resize(200, 200)->save( public_path('img\\'. $filename));
            //table updation
            $user=Auth::user();
            $user->pic=$filename;
            $user->save();
            Alert::success('Your profile picture is updated!','Done!');
        }

        return redirect('profile');
    }

    // load the user view
    public function user(){
        return view('pages.customer.user');
    }

    // load the customer view
    public function move(){
        return view('pages.adminOnlyPages.customer')
        ->with('customer',Customer::all())
        ->with('c',null);
    }


    //find customer record and load to customerEdit blade
    public function find($id)
    {
        $cu=Customer::find($id);
        return view('pages.adminOnlyPages.customerEdit')
            ->with('customer',$cu);
    }

    //delete a customer
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

    //update customer details from to edit customers
    public function updateCustomer(Request $request)
    {
        $this->validate($request, [
            'Id'=>'required',
            'email'=>'required'
        ]);
            //edit customer details of user table
            $user=User::find($request->input('Id'));
            $user->Id=$request->input('Id');
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->save();
            //edit customer details of customer table
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

    //direct to addCustomer blade
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
    /*add customer from addCustomer blade*/
    public function storeCustomer(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'address' =>'required',
            'contactNo'=>'required|regex:/(0)[0-9]{9}/',
            'email' => 'required|unique:users',

        ]);
        /*create a user for the customer*/
        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        /*setting the password to default password*/
        $user->password=Hash::make('rajan123');
        $user->role='customer';
        $user->save();

        /*create customer recorde for the customer*/
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

    // Load the view with customer records which only match the search query
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

    // Load the change password view
    public function changePasswordForm()
    {
      return view('pages.customer.changePassword')->with('$user',Auth::user());
    }

    // function to change the password
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

    // The function to send notifications for users about new registrations
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

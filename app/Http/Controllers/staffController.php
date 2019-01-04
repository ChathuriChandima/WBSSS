<?php

namespace App\Http\Controllers;
use Alert;
use DB;
use App\Staff;
use App\User;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class staffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addStaff()
    {
        return view('pages.adminOnlyPages.addStaff');
    }
    public function index(Request $request)
    {
        $staff = Staff::orderBy('name','address','contactNo','email')->paginate(5);
        return view('adminOnlyPages.staff',compact('staff'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function move(){
        return view('pages.adminOnlyPages.staff')
        ->with('staff',Staff::all())
        ->with('c',null);
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
            'name' => 'required',
            'address' =>'required',
            'contactNo'=>'required',
            'email' => 'required',

        ]);
        $staff=new Staff;
        $staff->name=$request->input('name');
        $staff->address=$request->input('address');
        $staff->contactNo=$request->input('contactNo');
        $staff->email=$request->input('email');
        $staff->save();
        Alert::success('Your changes are saved.','Done!');
        return redirect('staff');


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
            'address'=>'required',
            'contactNo'=>'required'
        ]);
            $staff=Staff::find($id);
            $staff->address=$request->input('address');
            $staff->contactNo=$request->input('contactNo');
            $staff->save();
            Alert::success('Your changes are saved.','Done!');
            return redirect('staff');
    }

    public function viewProfile()
    {
      return view('pages.staff.viewProfile')->with('staff',Customer::find(Auth::user()->id));
    }

    public function changePasswordForm()
    {
      return view('pages.staff.changePassword')->with('$user',User::find(Auth::user()->id));
    }

    public function changePassword(Request $request)
    {
      $this->validate($request, [
        'currentPassword'=>'required',
        'newPassword' => 'required',
        'verifyPassword' => 'required'
      ]);
      $user = User::find(Auth::user()->id);
      if ($user->password == $request->input('currentPassword')){
        $user->password = $request->input('newPassword');
        $user->save();
        return redirect('viewProfile');
      }
    }



}

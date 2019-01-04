<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Alert;
use DB;
use App\Staff;
use App\User;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Notifications\SingleUser;
use Illuminate\Support\Facades\Hash;

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
        $user=new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->role=$request->input('role');
        $user->save();
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


    public function destroy($id)
    {

        $v=Staff::find($id);
        $v->delete();
        Alert::success('Deleted successfully.','Done!');
        return redirect('staff');
    }

    public function search(){
        $q=Input::get('q');
        $staff=Staff::where('id','LIKE',$q)->get();
        $staff_name=Staff::where('name','LIKE','%'.$q.'%')->get();
        if(count($staff)>0){
            return view('pages.adminOnlyPages.searchStaff')->withDetails($staff)->with('c',1 )
            ->with('staff',Staff::all());
        }elseif(count($staff_name)>0){
            return view('pages.adminOnlyPages.searchStaff')->withDetails($staff_name)->with('c',0 )
            ->with('staff',Staff::all());

        }else{
            Alert::info('Try to search Again.....','Not Found!');
            return redirect('staff');
        }
    }

}

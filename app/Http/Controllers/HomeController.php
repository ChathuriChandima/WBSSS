<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\vehicle;
use Alert;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loggedin');
    }
    public function change()
    {
      return view('h')->with('customer',Customer::find(Auth::user()->id));
    }
    public function home()
    {
        return view('home');
    }



    /* Methods to handle admin's requests for access pages*/
    public function admin(Request $req){
      return view('middleware')->withMessage("Admin");
    }

    public function customerPage(Request $req){
      return view('pages.adminOnlyPages.customer');
    }

    public function staffPage(Request $req){
      return view('pages.adminOnlyPages.staff');
    }

    /* Methods to handle customer's requests for access pages*/
    public function customer(Request $req){
      return view('middleware')->withMessage("Customer");
    }
    public function myVehical(Request $req){
      return view('pages.myVehical');
    }

    /* Methods to handle accountant's requests for access pages*/
    public function accountant(Request $req){
      return view('middleware')->withMessage("Accountant");
    }
    public function vehicles(Request $req){
      return view('pages.vehicle.vehicles');
    }
    public function services(Request $req){
      return view('pages.accountant.services');
    }

    /* Methods to handle mechanic's requests for access pages*/
    public function mechanic(Request $req){
      return view('middleware')->withMessage("Mechanic");
    }

    /* Methods to handle user's requests for access pages*/
    public function user(Request $req){
      return view('middleware')->withMessage("User");
    }

    /* Methods to handle staff's requests for access pages*/
    public function staff(Request $req){
      return view('middleware')->withMessage("Staff");
    }

    /* Methods to handle management's requests for access pages*/

    /* End of page access request methods */
}

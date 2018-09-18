<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;

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
        return view('home');
    }
    public function change()
    {
        return view('h');
    }

    

    public function admin(Request $req){
      return view('middleware')->withMessage("Admin");
    }

    public function customer(Request $req){
      return view('middleware')->withMessage("Customer");
    }

    public function accountant(Request $req){
      return view('middleware')->withMessage("Accountant");
    }

    public function mechanic(Request $req){
      return view('middleware')->withMessage("Mechanic");
    }

    public function user(Request $req){
      return view('middleware')->withMessage("User");
    }

    public function staff(Request $req){
      return view('middleware')->withMessage("Staff");
    }
}

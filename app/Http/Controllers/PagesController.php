<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Loads the index page
    public function index(){
        $title='RAJAAN MOTORS';
        return view('pages.index')->with('title',$title);
    }

    // Loads the service page
    public function service(){
        $title='Our Services';
        return view('pages.service')->with('title',$title);
    }

    // Loads the login page
    public function login(){
        $title='Login';
        return view('pages.login')->with('title',$title);
    }

    // Loads the contact us page
    public function contact(){
        $title='Contact Us';
        return view('pages.contact')->with('title',$title);
    }

    // Loads the users page at admin pannel
    public function users(){
        return view('pages.adminOnlyPages.users');
    }

}

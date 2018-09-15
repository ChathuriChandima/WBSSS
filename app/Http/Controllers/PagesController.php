<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title='RAJAAN MOTORS';
        return view('pages.index')->with('title',$title);
    }
    public function service(){
        $title='Our Services';
        return view('pages.service')->with('title',$title);
    }
    public function login(){
        $title='Login';
        return view('pages.login')->with('title',$title);
    }
    public function contact(){
        $title='Contact Us';
        return view('pages.contact')->with('title',$title);
    }
}

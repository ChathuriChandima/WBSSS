<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class staffController extends Controller
{
    
    public function addStaff()
    {
        return view('pages.adminOnlyPages.addStaff');
    }
}
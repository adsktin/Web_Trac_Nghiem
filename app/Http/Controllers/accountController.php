<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accountController extends Controller
{
    //
    public function index(){
        return view("admin.pages.account");
    }
}

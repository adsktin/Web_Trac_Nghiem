<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listaccountController extends Controller
{
    //
    public function index(){
        return view("admin.pages.listaccount");
    }
}

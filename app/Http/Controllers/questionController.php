<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class questionController extends Controller
{
    //
    public function index(){
        return view("admin.pages.question");
    }
}

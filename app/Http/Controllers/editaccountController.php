<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class editaccountController extends Controller
{
    //
    public function index()
    {
        return view("admin.pages.editaccount");
    }
}
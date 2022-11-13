<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class listaccountController extends Controller
{
    //
    public function index(){
        $lstuser = User::all()->where('status', 1);
        return view("admin.pages.listaccount");
    }
}

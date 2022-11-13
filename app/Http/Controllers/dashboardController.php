<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class dashboardController extends Controller
{
    //
    public function showdashboard()
    {

        return  redirect()->route('dashboard');
    }
}

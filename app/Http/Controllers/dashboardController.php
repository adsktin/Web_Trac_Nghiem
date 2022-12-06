<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Questions;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function showdashboard()
    {
        $i = 0;
        // $users = User::all();
        $users = DB::select('SELECT *,
        DENSE_RANK() OVER (ORDER BY totalscore DESC) dens_rank
        FROM users;');
        $countquestion = Questions::count();
        $countnews = News::count();
        return  view('pages.dashboard', compact('i', 'users', 'countquestion', 'countnews'));
    }
}
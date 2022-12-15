<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class RankController extends Controller
{
    public function showranks()
    {
        
        // $users = User::all();
        $ranks = DB::select('SELECT id,avatar,email,name,totalscore,status,
        DENSE_RANK() OVER (ORDER BY totalscore DESC) dens_rank
        FROM users where isAdmin = 0 && isManager = 0;');
        foreach ($ranks as $rank) {
            $rank->avatar = asset('storage/accounts/' . $rank->id . '/avatar/' . $rank->avatar);
        }
        return response()->json($ranks, 200);
    }
}

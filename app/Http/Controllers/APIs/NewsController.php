<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    //
    public function shownews()
    {
        $news = News::orderBy('id', 'desc')->get();
        foreach ($news as $new) {
            $new->image = asset('storage/news/' . $new->image);
        }
        return response()->json($news, 200);
    }
}
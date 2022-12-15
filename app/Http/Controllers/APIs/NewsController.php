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

    public function getDetailNews($id)
    {
        $news = News::WHERE('id', $id)->first();
        return response($news, 200)
            ->header('Content-Type', 'application/json');
    }
}

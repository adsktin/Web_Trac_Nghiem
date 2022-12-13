<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
//use Image;
use Intervention\Image\Facades\Image;
//

class NewsController extends Controller
{
    //
    public function shownews()
    {
        $i = News::all()->count();
        $count = News::count();
        $news = News::all()->sortByDesc('id');
        return  view('pages.news.shownews', compact('i', 'news', 'count'));
    }

    public function showcreate()
    {
        return  view('pages.news.create-news');
    }
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required',
                'decription' => 'required',
            ],
            [
                'image.required' => 'Chưa thêm hình cho tin tức!',
                'title.required' => 'Tiêu đề không được trống!',
                'decription.required' => 'Nội dung không được trống!',
            ]
        );


        $data = $request->all();
        $news = new News();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $Extentsion = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $Extentsion;
            $request->file('image')->storeAs('news/', $fileName);
            $file = Image::make(storage_path('app/public/news/' . $fileName));
            $file->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $file->save(storage_path('app/public/news/' . $fileName));
            $news->image = $fileName;
        }
        $news->title = $data['title'];
        $news->decription = $data['decription'];
        $news->status = true;
        $news->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $news->updated_at = null;

        $news->save();
        return redirect()->back()->with('success', 'Thêm tin tức thành công!');
    }

    public function edit($id)
    {
        $new = News::find($id);
        return view('pages.news.edit-news', compact('new'));
    }
    public function update(Request $request)
    {

        $this->validate(
            $request,
            [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'title' => 'required',
                'decription' => 'required',
            ],
            [
                'title.required' => 'Tiêu đề không được trống!',
                'decription.required' => 'Nội dung không được trống!',
            ]
        );

        $data = $request->all();
        $new = News::WHERE('id', $request->id)->first();
        if (!empty($new)) {
            $new->title = $data['title'];
            $new->decription = $data['decription'];
            $new->status = true;
            //$acc->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $new->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            //news
            // if ($request->hasfile('image')) {
            //     $file = $request->file('image');
            //     $extenstion = $file->getClientOriginalExtension();
            //     $filename =  $new->id . time() . '.' . $extenstion;
            //     $file->move(public_path('assets/img/news/'), $filename);
            //     $new->image = $filename;
            // }
            // test 2
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $Extentsion = $request->file('image')->getClientOriginalExtension();
                //$fileExtentsion = $request->file('avatar')->extension();
                $fileName = time() . '.' . $Extentsion;
                $request->file('image')->storeAs('news/', $fileName);
                $file = Image::make(storage_path('app/public/news/' . $fileName));
                $file->resize(300, 200, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $file->save(storage_path('app/public/news/' . $fileName));
                $new->image = $fileName;
            }
            $new->save();
            return redirect()->back()
                ->with('success', 'Cập nhật thành công!');
        }
    }

    public function delete(Request $request)
    {
        News::find($request->id)->delete();

        return redirect()->route('show-news')->with('success_delete', 'Xóa tin tức thành công!');
    }
}
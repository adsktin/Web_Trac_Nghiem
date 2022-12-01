<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Types;
use App\Models\Questions;
use App\Models\Answers;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class QuestionController extends Controller
{
    // questions
    public function showquestion()
    {
        $i = 0;
        $count = Questions::count();
        $questions = Questions::all();
        $answers = Answers::all();
        $types = Types::all();
        return  view('pages.question.showquestion', compact('i', 'types', 'questions', 'answers', 'count'));
    }
    //create question
    public function showcreate()
    {
        $types = Types::all();
        return  view('pages.question.create-question')->with('types', $types);
    }
    public function create(Request $request)
    {

        $this->validate(
            $request,
            [
                'questcontent' => 'required',
                'answer1' => 'required',
                'answer2' => 'required',
                'answer3' => 'required',
                'answer4' => 'required',
            ],
            [
                'questcontent.required' => 'Chưa nhập nội dung câu hỏi!',
                'answer1.required' => 'Chưa nhập nội dung câu trả lời Đúng!',
                'answer2.required' => 'Chưa nhập nội dung câu trả lời Sai!',
                'answer3.required' => 'Chưa nhập nội dung câu trả lời Sai!',
                'answer4.required' => 'Chưa nhập nội dung câu trả lời Sai!',
            ]
        );


        $data = $request->all();
        $questions = new Questions();
        $questions->type_id = $data['type'];
        $questions->questcontent = $data['questcontent'];
        //
        $questions->status = true;
        $questions->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $questions->updated_at = null;
        $questions->save();
        // create answer1
        $answer1 = new Answers();
        $answer1->question_id = $questions->id;
        $answer1->answercontent = $data['answer1'];
        $answer1->answerbool = true;
        $answer1->status = true;
        // create answer2
        $answer2 = new Answers();
        $answer2->question_id = $questions->id;
        $answer2->answercontent = $data['answer2'];
        $answer2->answerbool = false;
        $answer2->status = true;
        // create answer3
        $answer3 = new Answers();
        $answer3->question_id = $questions->id;
        $answer3->answercontent = $data['answer3'];
        $answer3->answerbool = false;
        $answer3->status = true;
        // create answer4
        $answer4 = new Answers();
        $answer4->question_id = $questions->id;
        $answer4->answercontent = $data['answer4'];
        $answer4->answerbool = false;
        $answer4->status = true;
        $answer1->save();
        $answer2->save();
        $answer3->save();
        $answer4->save();

        return redirect()->back()->with('success', 'Thêm câu hỏi thành công!');
    }
    public function edit($id)
    {
        $questions = Questions::find($id);
        $answers = Answers::all();
        $types = Types::all();
        return view('pages.question.edit-question', compact('questions', 'types', 'answers'));
    }
    public function update(Request $request)
    {

        $this->validate(
            $request,
            [
                'questcontent' => 'required',
                'answer1' => 'required',
                'answer2' => 'required',
                'answer3' => 'required',
                'answer4' => 'required',
            ],
            [
                'questcontent.required' => 'Chưa nhập nội dung câu hỏi!',
                'answer1.required' => 'Chưa nhập nội dung câu trả lời Đúng!',
                'answer2.required' => 'Chưa nhập nội dung câu trả lời Sai!',
                'answer3.required' => 'Chưa nhập nội dung câu trả lời Sai!',
                'answer4.required' => 'Chưa nhập nội dung câu trả lời Sai!',
            ]
        );


        $data = $request->all();
        $questions = Questions::WHERE('id', $request->id)->first();
        $questions->type_id = $data['type'];
        $questions->questcontent = $data['questcontent'];
        $questions->save();
        //$questions->status = true;
        //$questions->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $questions->updated_at = Carbon::now('Asia/Ho_Chi_Minh');


        $answer1 = Answers::where('id', $questions->answers[0]->id)->first();
        $answer1->answercontent = $data['answer1'];
        $answer2 = Answers::where('id', $questions->answers[1]->id)->first();
        $answer2->answercontent = $data['answer2'];
        $answer3 = Answers::where('id', $questions->answers[2]->id)->first();
        $answer3->answercontent = $data['answer3'];
        $answer4 = Answers::where('id', $questions->answers[3]->id)->first();
        $answer4->answercontent = $data['answer4'];
        $answer1->save();
        $answer2->save();
        $answer3->save();
        $answer4->save();

        return redirect()->back()->with('success', 'Sửa câu hỏi thành công!');
    }
    public function delete(Request $request)
    {
        Questions::find($request->id)->delete();
        return redirect()->route('show-question')->with('success_delete', 'Xóa câu hỏi thành công!');
    }

    // type question
    public function showtype()
    {
        $i = 0;
        $types = Types::all();
        return  view('pages.question.type.type-question', compact('i', 'types'));
    }
    public function createtype(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type' => 'required',
            ],
            [
                'image.required' => 'Chưa thêm hình cho thể loại!',
                'type.required' => 'Tên thể loại không được trống!',
            ]
        );


        $data = $request->all();
        $type = new Types();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $Extentsion = $request->file('image')->getClientOriginalExtension();
            $fileName = time() . '.' . $Extentsion;
            $request->file('image')->storeAs('types/', $fileName);
            $file = Image::make(storage_path('app/public/types/' . $fileName));
            $file->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
            $file->save(storage_path('app/public/types/' . $fileName));
            $type->image = $fileName;
        }
        $type->type = $data['type'];
        $type->status = 1;
        $type->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $type->updated_at = null;
        $type->save();

        return redirect()->back()->with('success', 'Thêm thể loại thành công!');
    }
    public function deletetypes(Request $request)
    {
        Types::find($request->id)->delete();
        return redirect()->route('createtype-question')->with('success_delete', 'Xóa thể loại thành công!');
    }
}
<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Types;
use App\Models\Questions;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    //
    public function getTypeQuestion()
    {
        $tpq = Types::WHERE('status', 1)->get();
        foreach ($tpq as $tp) {
            $tp->image = asset('storage/types/' . $tp->image);
        }
        return response()->json($tpq, 200);
    }

    public function randQuestion(Request $request)
    {
        $lstQuestion = Questions::WHERE('type_id', $request->type_id)->orderBy(DB::raw('RAND()'))->limit(5)->get();
        foreach ($lstQuestion as $question) {
            $question->answers;
        }
        return response()->json($lstQuestion, 200);
    }
}
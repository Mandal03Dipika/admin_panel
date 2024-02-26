<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($subject_id)
    {
        return view('quiz.index', compact('subject_id'));
    }

    public function quiz_index_question($subject_id)
    {
        $user_id = auth()->user()->id;
        //dd($user_id);
        $question = Question::
            where('subject_id', $subject_id)
            ->where('weightage', 1)
            ->get()
            ->random(1)[0];
        if (!$question) {
            return response()->json([
                'status' => false,
                'msg' => 'Question nhi mil raha',
            ]);
        }
        return response()->json([
            'status' => true,
            'question' => $question,
        ]);
        //dd($question);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function over($id)
    {
        $data['user_question'] = UserQuestion::find($id);
        $quiz_questions = QuizQuestion::
            where('quiz_id', $id)
            ->get();
        $data['quiz_questions'] = $quiz_questions->toArray();
        $htmlView = view('quiz.over', $data)->render();
        return response()->json([
            'status' => 'end',
            'data' => $data,
            'htmlView' => $htmlView,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'correct_ans' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => 'Something is fissy',
            ]);
        }
        $user_id = auth()->user()->id;
        $ex = UserQuestion::
            where('status', 1)
            ->where('user_id', $user_id)
            ->first();
        $data = new UserQuestion();
        if ($ex == null) {
            $data->status = 1;
            $data->user_id = $user_id;
            $data->subject_id = $request->subject_id;
            $data->save();
            $ex = $data;
        }
        $qq = new QuizQuestion();
        $qq->quiz_id = ($ex == null) ? $data->id : $ex->id;
        $qq->question_id = $request->question_id;
        $qq->weightage = $request->weightage;
        // dd($request->question_id);
        $question = Question::find($request->question_id);
        if ($question->correct_ans == $request->correct_ans) {
            $qq->is_correct = true;
        } else {
            $qq->is_correct = false;
        }
        $qq->save();
        $quiz_questions = QuizQuestion::
            where('quiz_id', $ex->id)
            ->get();
        if ($quiz_questions->count() == 5) {
            $ex->status = 0;
            $ex->save();
            return response()->json([
                'status' => 'end',
                'ex' => $ex,
            ]);
        }
        return response()->json([
            'status' => 'continue',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}

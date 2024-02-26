<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuizQuestion;
use App\Models\Subject;
use App\Models\UserQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user_id = auth()->user()->id;
        $ex_game = UserQuestion::
            where('status', 1)
            ->where('subject_id', $id)
            ->where('user_id', $user_id)
            ->first();
        //dd($ex_game);
        if ($ex_game == null) {
            try {
                $data['question'] = Question::
                    where('subject_id', $id)
                    ->where('weightage', 1)
                    ->get()
                    ->random(1)[0];
                $data['quiz_questions'] = [];
            } catch (\Throwable $th) {

                return redirect()->route('gameplay.choose');

            }

        } else {
            $quiz_questions = QuizQuestion::
                where('quiz_id', $ex_game->id)
                ->get();
            #dd($quiz_questions->count());
            $data['quiz_questions'] = $quiz_questions->toArray();
            //dd($quiz_questions->pluck('question_id')->toArray());
            $ex_question = $quiz_questions->pluck('question_id')->toArray();
            $ex_weightage = $quiz_questions->pluck('weightage')->toArray();
            if ($quiz_questions->count() <= 2) {
                $data['question'] = Question::
                    whereNotIn('id', $ex_question)
                    ->where('subject_id', $id)
                    ->where('weightage', 1)
                    ->get()
                    ->random(1)[0];
            } else if ($quiz_questions->count() <= 4) {
                $data['question'] = Question::
                    whereNotIn('id', $ex_question)
                    ->where('subject_id', $id)
                    ->where('weightage', 2)
                    ->get()
                    ->random(1)[0];
            } else {
                $data['question'] = Question::
                    whereNotIn('id', $ex_question)
                    ->where('subject_id', $id)
                    ->where('weightage', 3)
                    ->get()
                    ->random(1)[0];
            }
        }
        //$question=Question::get()->random(1)[0];

        return view('gameplay.index', $data);
    }
    public function over($id)
    {
        $data['user_question'] = UserQuestion::find($id);
        $quiz_questions = QuizQuestion::where('quiz_id', $id)->get();
        $data['quiz_questions'] = $quiz_questions->toArray();
        return view('gameplay.over', $data);
    }
    public function choose()
    {
        $data['subjects'] = Subject::all();
        return view('gameplay.choose', $data);
    }
    public function store(Request $request, $id)
    {

        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'correct_ans' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user_id = auth()->user()->id;
        // dd($user_id);
        // $ex=UserQuestion::find($user_id);
        $ex = UserQuestion::where('status', 1)->where('user_id', $user_id)->first();
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
        $qq->question_id = $id;
        $question = Question::find($id);
        if ($question->correct_ans == $request->correct_ans) {
            $qq->is_correct = true;
        } else {
            $qq->is_correct = false;
        }
        $qq->weightage = $request->weightage;
        $qq->save();
        $quiz_questions = QuizQuestion::
            where('quiz_id', $ex->id)
            ->get();
        if ($quiz_questions->count() == 5) {
            $ex->status = 0;
            $ex->save();
            return redirect()->route('gameplay.over', $ex->id);
        }
        //$question=Question::get()->random(1)[0];
        //dd($question);
        return redirect()->route('gameplay.index', $request->subject_id);
        // dd($data);
        // $user_ans=$request->correct_ans;
        // $user_ans=$request->correct_ans;
        // dd($user_ans);
    }

    public function controlAuto($id)
    {
        $user_id = auth()->user()->id;
        $question = Question::find($id)->first();
        $subject_id = $question->subject_id;
        $ex = UserQuestion::where('status', 1)
            ->where('subject_id', $subject_id)
            ->where('user_id', $user_id)
            ->first();
        if (!$ex) {
            return redirect()->route('gameplay.index', $subject_id);
        }
        $qq = new QuizQuestion();
        $qq->quiz_id = $ex->id;
        $qq->question_id = $id;
        $qq->is_correct = false;
        $qq->weightage = $question->weightage;
        $qq->save();
        $quiz_questions = QuizQuestion::where('quiz_id', $ex->id)->get();
        if ($quiz_questions->count() == 5) {
            $ex->status = 0;
            $ex->save();
            return redirect()->route('gameplay.over', $ex->id);
        }
        return redirect()->route('gameplay.index', $subject_id);
    }
    /**
     * Display the specified resource.
     */
    public function show(UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserQuestion $userQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserQuestion $userQuestion)
    {
        //
    }
}

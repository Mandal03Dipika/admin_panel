<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // protected $subject=['science','commerce','arts'];
    public function index()
    {

        $data['subjects'] = Subject::all();
        // $data['weightages'] = Weightage::all();
        $data['questions'] = Question::with('subject')->get();
        // $data['questions'] = Question::with('weightage')->get();
        // dd($data);
        return view('question.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['subjects'] = Subject::all();
        // $data['weightages'] = Weightage::all();
        return view('question.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question_text' => 'required',
            'image' => 'required',

            'option_a' => 'required',
            'a_image' => 'required',
            'option_b' => 'required',
            'b_image' => 'required',
            'option_c' => 'required',
            'c_image' => 'required',
            'option_d' => 'required',
            'd_image' => 'required',
            'correct_ans' => 'required',
            'subject_id' => 'required|int|min:1',

        ], [
            'question_text.required' => 'You need to write Question',
            'option_a' => 'You need to fill "Option A"',
            'subject_id' => 'Select subject first then only entry is valid',
            'weightage_id' => 'Select weightage first then only entry is valid',
        ]);
        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->getMessageBag());
        }
        $question = new Question;
        // dd($request->all());
        if ($request->file('image')) {
            $file = $request->file('image');
            // @unlink(public_path('upload/student_images/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['image'] = $filename;
        }
        if ($request->file('a_image')) {
            $file = $request->file('a_image');
            // @unlink(public_path('upload/student_images/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['a_image'] = $filename;
        }
        if ($request->file('b_image')) {
            $file = $request->file('b_image');
            // @unlink(public_path('upload/student_images/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['b_image'] = $filename;
        }
        if ($request->file('c_image')) {
            $file = $request->file('c_image');
            // @unlink(public_path('upload/student_images/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['c_image'] = $filename;
        }
        if ($request->file('d_image')) {
            $file = $request->file('d_image');
            // @unlink(public_path('upload/student_images/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['d_image'] = $filename;
        }
        $question->question_text = $request->question_text;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->correct_ans = $request->correct_ans;
        $question->subject_id = $request->subject_id;
        $question->weightage = $request->weightage;
        //dd($question);
        $question->save();
        return redirect()
            ->route('question.index')
            ->with('success', 'Question Created');
    }
    public function search($id, $id1)
    {
        $data['questions'] = Question::where('subject_id', $id)->where('weightage', $id1)->get();
        // dd($data['questions']);
        // $data['questions'] = Question::where('subject_id', $id)->get();

        $htmlView = view('question.partial.table_index', $data)->render();
        return response()->json(
            ['status' => 200,
                'htmlData' => $htmlView,
            ]);

    }
    /**
     * Display the specified resource.
     */
    public function show(question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['subjects'] = Subject::all();
        // $data['weightages'] = Weightage::all();
        $data['question'] = Question::find($id);
        return view('question.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/question/' . $question->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['image'] = $filename;
        }
        if ($request->file('a_image')) {
            $file = $request->file('a_image');
            @unlink(public_path('upload/question/' . $question->a_image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['a_image'] = $filename;
        }
        if ($request->file('b_image')) {
            $file = $request->file('b_image');
            @unlink(public_path('upload/question/' . $question->b_image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['b_image'] = $filename;
        }
        if ($request->file('c_image')) {
            $file = $request->file('c_image');
            @unlink(public_path('upload/question/' . $question->c_image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['c_image'] = $filename;
        }
        if ($request->file('d_image')) {
            $file = $request->file('d_image');
            @unlink(public_path('upload/question/' . $question->d_image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/question'), $filename);
            $question['d_image'] = $filename;
        }
        $question->question_text = $request->question_text;
        $question->option_a = $request->option_a;
        $question->option_b = $request->option_b;
        $question->option_c = $request->option_c;
        $question->option_d = $request->option_d;
        $question->correct_ans = $request->correct_ans;
        $question->subject_id = $request->subject_id;
        $question->weightage = $request->weightage;
        $question->save();
        return redirect()->route('question.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect()->route('question.index');
    }
}

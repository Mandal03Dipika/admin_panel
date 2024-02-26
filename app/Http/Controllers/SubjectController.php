<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['subjects'] = Subject::get();
        return view('subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $subject = new Subject;

        $subject->name = $request->name;
        if ($request->file('image')) {
            $file = $request->file('image');
            // @unlink(public_path('upload/student_images/'.$data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/subject'), $filename);
            $subject['image'] = $filename;
        }
        // dd($subject);
        $subject->save();
        return redirect()->route('subject.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['subject'] = Subject::find($id);
        return view('subject.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $subject = Subject::find($id);

        $subject->name = $request->name;
        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/subject/' . $subject->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/subject'), $filename);
            $subject['image'] = $filename;
        }
        // dd($subject);
        $subject->update();
        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.index');
    }
}

@extends('layouts.main')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div style="font-size: 30px">Edit Your Questions Here!!</div>
        <a href="{{route('question.index')}}" class="m-3 btn btn-warning">Index Page</a>
    </div>
    <div class="container">
        <form action="{{route('question.update',$question->id)}}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="p-4 my-4 card bg-warning-subtle">
                <div class="d-flex">
                    <div class="col-md-4">
                        <select name="subject_id" id="subject_id" class="form-control">
                            <option value="">Select Subject</option>
                            @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $subject->id==$question->subject_id ?'selected':''
                                }}>{{
                                $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="weightage" id="weightage" class="form-select" aria-label="Default select example">
                            <option selected>- Select Level</option>
                            @foreach ([1,2,3] as $data)
                            <option value="{{$data}}">{{$data}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success ms-4"><i
                            class="fa-solid fa-pen-fancy"></i>Update</button>
                </div>
            </div>
            <div class="my-2 input-group">
                <span class="input-group-text" style="width: 100px; height:40px">Question</span>
                <input name="image" type="file" class="form-control">
                <img class="img-fluid" style="width:100px; height:100px; border-radius:100px"
                    src="{{asset('upload/question').'/'.$question->image}}" alt="">
                <textarea class="form-control" aria-label="With textarea" name="question_text">{{$question->question_text}}
                </textarea>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text">Option A</span>
                <input name="a_image" type="file" class="form-control">
                <img class="img-fluid" style="width:100px;height:100px"
                    src="{{asset('upload/question').'/'.$question->a_image}}" alt="">
                <textarea class="form-control" aria-label="With textarea"
                    name="option_a">{{$question->option_a}}</textarea>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text">Option B</span>
                <input name="b_image" type="file" class="form-control">
                <img class="img-fluid" style="width:100px;height:100px"
                    src="{{asset('upload/question').'/'.$question->b_image}}" alt="">
                <textarea class="form-control" aria-label="With textarea"
                    name="option_b">{{$question->option_b}}</textarea>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text">Option C</span>
                <input name="c_image" type="file" class="form-control">
                <img class="img-fluid" style="width:100px;height:100px"
                    src="{{asset('upload/question').'/'.$question->c_image}}" alt="">
                <textarea class="form-control" aria-label="With textarea"
                    name="option_c">{{$question->option_c}}</textarea>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text">Option D</span>
                <input name="d_image" type="file" class="form-control">
                <img class="img-fluid" style="width:100px;height:100px"
                    src="{{asset('upload/question').'/'.$question->d_image}}" alt="">
                <textarea class="form-control" aria-label="With textarea"
                    name="option_d">{{$question->option_d}}</textarea>
            </div>
            <div class="mb-3 input-group">
                <span class="input-group-text">Correct Answer</span>
                <textarea class="form-control" aria-label="With textarea"
                    name="correct_ans">{{$question->correct_ans}}</textarea>
            </div>
        </form>
    </div>
</div>
@endsection
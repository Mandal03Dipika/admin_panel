@extends('layouts.main')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div style="font-size: 30px;">Create Your Qusetion Here!!</div>
        <a href="{{route('question.index')}}" class="m-3 btn btn-warning">Index Page</a>
    </div>
    <div class="container m-3 border border-dark bg-warning-subtle" style="height: 400px">
        <form action="{{route('question.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="p-4 my-4 card bg-warning-subtle">
                <div class="d-flex">
                    <div class="col-md-4">
                        <select name="subject_id" class="form-select" aria-label="Default select example">
                            <option selected>- Select Subject</option>
                            @foreach ($subjects as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="weightage" class="form-select" aria-label="Default select example">
                            <option selected>- Select Level</option>
                            @foreach ([1,2,3] as $data)
                            <option value="{{$data}}">{{$data}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="plus btn btn-success ms-4"><i class="fa-solid fa-plus"></i>Add</button>
                </div>
            </div>
            <div class="my-2 input-group">
                <input name="image" type="file" class="form-control" style="width: 30%">
                <span class="input-group-text" style="width: 10%">Question</span>
                <textarea class="form-control" aria-label="With textarea" name="question_text"
                    style="width: 60%"></textarea>
            </div>
            <div class="mb-3 input-group">
                <input class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>
                <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>a.</span>
                <input name="a_image" type="file" class="form-control" style="width: 30%">
                <input name="option_a" type="text" class="form-control" placeholder="Option A"
                    aria-describedby="basic-addon1">
            </div>
            <div class="mb-3 input-group">
                <input class="form-check-input" type="radio" name="correct_ans" value="option_b">
                <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>b.</span>
                <input name="b_image" type="file" class="form-control" style="width: 30%">
                <input name="option_b" type="text" class="form-control" placeholder="Option B"
                    aria-describedby="basic-addon1">
            </div>
            <div class="mb-3 input-group">
                <input class="form-check-input" type="radio" name="correct_ans" value="option_c">
                <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>c.</span>
                <input name="c_image" type="file" class="form-control" style="width: 30%">
                <input name="option_c" type="text" class="form-control" placeholder="Option C"
                    aria-describedby="basic-addon1">
            </div>
            <div class="mb-3 input-group">
                <input class="form-check-input" type="radio" name="correct_ans" value="option_d">
                <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>d.</span>
                <input name="d_image" type="file" class="form-control" style="width: 30%">
                <input name="option_d" type="text" class="form-control" placeholder="Option D"
                    aria-describedby="basic-addon1">
            </div>
        </form>
    </div>
</div>
@endsection

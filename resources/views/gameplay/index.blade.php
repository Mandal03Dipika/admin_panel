@extends('layouts.main')
@section('content')
<style>
    .circle {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
    }
</style>
<h3 class="text-center">Game Play For User</h3>
@if($errors)
@foreach ($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
@endif
<div class="gap-3 row justify-content-center">
    @foreach([1,2,3,4,5] as $k => $v)
    @if(count($quiz_questions)==0)
    <div class="p-4 border rounded-circle border-primary circle">{{$v}}</div>
    @else
    @if(isset($quiz_questions[$k]) && $quiz_questions[$k]['is_correct']==1)
    <div class="p-4 border rounded-circle border-success bg-success circle">{{$v}}</div>
    @elseif(isset($quiz_questions[$k]) && $quiz_questions[$k]['is_correct']==0)
    <div class="p-4 border rounded-circle border-danger bg-danger circle">{{$v}}</div>
    @else
    <div class="p-4 border rounded-circle border-primary circle">{{$v}}</div>
    @endif
    @endif
    @endforeach
</div>
<div class="container m-3 mx-auto border border-dark bg-warning-subtle">
    <form action="{{route('gameplay.store',$question->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="my-2 input-group">
            <img style="width:100px;height:100px" src="{{asset('upload/question').'/'.$question->image}}" alt="">
            {{-- <span class="input-group-text">Question {{$question->id}}</span> --}}
            <div class="form-control" aria-label="With textarea" name="question_text">{{$question->question_text}}</div>
        </div>
        <div class="mb-3 input-group">
            <input class="form-check-input" type="radio" name="correct_ans" value="option_a" id="optionA">
            <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>a.</span>
            <img style="width:100px;height:100px" src="{{asset('upload/question').'/'.$question->a_image}}" alt="">
            <div name="option_a" type="text" class="form-control" placeholder="Option A" aria-describedby="basic-addon1"
                id="option_A">{{$question->option_a}}</div>
        </div>
        <div class="mb-3 input-group">
            <input class="form-check-input" type="radio" name="correct_ans" value="option_b" id="optionB">
            <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>b.</span>
            <img style="width:100px;height:100px" src="{{asset('upload/question').'/'.$question->b_image}}" alt="">
            <div name="option_b" type="text" class="form-control" placeholder="Option B" aria-describedby="basic-addon1"
                id="option_B">{{$question->option_b}}</div>
        </div>
        <div class="mb-3 input-group">
            <input class="form-check-input" type="radio" name="correct_ans" value="option_c" id="optionC">
            <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>c.</span>
            <img style="width:100px;height:100px" src="{{asset('upload/question').'/'.$question->c_image}}" alt="">
            <div name="option_c" type="text" class="form-control" placeholder="Option C" aria-describedby="basic-addon1"
                id="option_C">{{$question->option_c}}</div>
        </div>
        <div class="mb-3 input-group">
            <input class="form-check-input" type="radio" name="correct_ans" value="option_d" id="optionD">
            <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>d.</span>
            <img style="width:100px;height:100px" src="{{asset('upload/question').'/'.$question->d_image}}" alt="">
            <div name="option_d" type="text" class="form-control" placeholder="Option D" aria-describedby="basic-addon1"
                id="option_D">{{$question->option_d}}</div>
        </div>
        <input type="text" name="subject_id" value="{{$question->subject_id}}" class="sr-only">
        <input type="text" name="weightage" style="color: black" value="{{$question->weightage}}" class="sr-only">
        <div class="p-4 border rounded-circle border-primary circle" id='count'>15</div>
        <button type="submit" class="btn btn-success float-end">Next</button>
    </form>
</div>
<script>
    var a= 15;
    var counter=document.querySelector('#count');
    console.log(@json($question->id));
    var url = "{{route('gameplay.controlauto',':id')}}";
    url = url.replace(':id',@json($question->id));
    setInterval(() => {
       show();
    }, 1000);

    function show()
    {
        if(a==0)
        {
            window.location.href = url;
            clearInterval(show);
        }
        else{
            counter.textContent=a
            console.log(a--);
        }
    }
</script>
@endsection
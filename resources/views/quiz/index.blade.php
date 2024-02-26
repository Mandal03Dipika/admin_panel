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
<div class="container" id="over_panel">
    <div class="pt-2 text-center" style="font-size: 45px; ">Game Play</div>
    <div class="gap-3 row justify-content-center">
        @foreach([1,2,3,4,5] as $k => $v)
        <div class="p-4 m-1 border rounded-circle border-primary circle" id='correct'>{{$v}}</div>
        @endforeach
    </div>
    <div class="container m-3 mx-auto border border-dark bg-warning-subtle" id='question_panel'></div>
</div>
@endsection
@push('script')
<script>
    var subject_id= @json($subject_id);
    var url=`{{route('quiz.index.question',':id')}}`;
    url=url.replace(':id',subject_id);
    getQuestion();
    $('#question_form').submit(function(event)
    {
        //var form=$('#question_form');
        event.preventDefault();
        return;

    });
    function getQuestion()
    {
        $.ajax({
            url:url,
            type:'GET',
            success:function(response)
            {
                if(response.status)
                {
                    var question= response.question;
                    var question_route=`{{route('quiz.store',':id')}}`;
                    question_route=question_route.replace(':id',question.id);
                    var assetUrl=`{{asset('upload/question')}}`;
                    var strHtml=`<form action="${question_route}" method="POST" enctype="multipart/form-data" id="question_form" onsubmit="event.preventDefault()">
                                    @csrf
                                    <div class="my-2 input-group">
                                        <img style="width:100px;height:100px" src="${assetUrl}/${question.image}" alt="">
                                        <div class="form-control" aria-label="With textarea" name="question_text">${question.question_text}</div>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <input class="form-check-input" type="radio" name="correct_ans" value="option_a" id="optionA">
                                        <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>a.</span>
                                        <img style="width:100px;height:100px" src="${assetUrl}/${question.a_image}" alt="">
                                        <div name="option_a" type="text" class="form-control" placeholder="Option A" aria-describedby="basic-addon1"
                                            id="option_A">${question.option_a}</div>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <input class="form-check-input" type="radio" name="correct_ans" value="option_b" id="optionB">
                                        <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>b.</span>
                                        <img style="width:100px;height:100px" src="${assetUrl}/${question.b_image}" alt="">
                                        <div name="option_b" type="text" class="form-control" placeholder="Option B" aria-describedby="basic-addon1"
                                            id="option_B">${question.option_b}</div>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <input class="form-check-input" type="radio" name="correct_ans" value="option_c" id="optionC">
                                        <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>c.</span>
                                        <img style="width:100px;height:100px" src="${assetUrl}/${question.c_image}" alt="">
                                        <div name="option_c" type="text" class="form-control" placeholder="Option C" aria-describedby="basic-addon1"
                                            id="option_C">${question.option_c}</div>
                                    </div>
                                    <div class="mb-3 input-group">
                                        <input class="form-check-input" type="radio" name="correct_ans" value="option_d" id="optionD">
                                        <span class="input-group-text" type="radio" name="correct_ans" value="option_a" checked>d.</span>
                                        <img style="width:100px;height:100px" src="${assetUrl}/${question.d_image}" alt="">
                                        <div name="option_d" type="text" class="form-control" placeholder="Option D" aria-describedby="basic-addon1"
                                            id="option_D">${question.option_d}</div>
                                    </div>
                                    <input type="text" name="subject_id" value="${question.subject_id}" class="sr-only">
                                    <input type="text" name="question_id" value="${question.id}" class="sr-only">
                                    <input type="text" name="weightage" style="color: black" value="${question.weightage}" class="sr-only">
                                    <div class="p-4 border rounded-circle border-primary circle" id='count'>15</div>
                                    <button type="button" class="btn btn-success float-end" id="submit" onClick="storeData()">Next</button>
                                </form>`;
                    $('#question_panel').html(strHtml);
                }
            }
        });
    }
    function storeData()
    {
        var url=$('#question_form').attr('action');
        var data= new FormData($('#question_form')[0]);
        $.ajax({
            url:url,
            type:'POST',
            contentType:false,
            processData:false,
            data:data,
            success:function(response)
            {
                if(response.status=='continue')
                {
                    getQuestion();
                }
                else if(response.status=='end')
                {
                    var quiz_id=response.ex.id;
                    over(quiz_id);
                }
            }
        });
    }
    function over(id)
    {
        var over_route=`{{route('quiz.over',':id')}}`;
        over_route=over_route.replace(':id',id);
        $.ajax({
            url: over_route,
            type:'GET',
            success:function(response)
            {
                if(response.status=='end')
                {
                    var over = response.htmlView;
                    $('#over_panel').html(over);
                }
            },
        });
        console.log('in');
    }
</script>
@endpush
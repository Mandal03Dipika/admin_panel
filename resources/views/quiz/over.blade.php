<style>
    .circle {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
    }
</style>
<div class="container p-5 border w-50 border-success border-3">
    <h1 style="font-size: 65px; font-weight:700;" class="text-center text-danger">Game Over</h1>
    <div class="gap-3 row justify-content-center">
        @php
        $correct=0;
        @endphp
        @foreach([1,2,3,4,5] as $k => $v)
        @if(count($quiz_questions)==0)
        <div class="p-4 m-1 border rounded-circle border-primary circle">{{$v}}</div>
        @else
        @if(isset($quiz_questions[$k]) && $quiz_questions[$k]['is_correct']==1)
        @php
        $correct++;
        @endphp
        <div class="p-4 m-1 border rounded-circle border-success bg-success circle">{{$v}}</div>
        @elseif(isset($quiz_questions[$k]) && $quiz_questions[$k]['is_correct']==0)
        <div class="p-4 m-1 border rounded-circle border-danger bg-danger circle">{{$v}}</div>
        @else
        <div class="p-4 m-1 border rounded-circle border-primary circle">{{$v}}</div>
        @endif
        @endif
        @endforeach
    </div>
    <h4 class="m-3 text-center">Correct answer {{$correct}} out of {{count($quiz_questions)}}</h4>
    <div class="text-center text-info fx-bold">
        @if($correct==0)
        <h2 class="text-center">Very bad</h2>
        <div style="font-size:65px; ">☹️</div>

        @elseif($correct==1)
        <h2 class="text-center">Better Luck Next Time</h2>
        <div style="font-size:65px; ">🙂</div>

        @elseif($correct==2)
        <h2 class="text-center"> Not Bad</h2>
        <div style="font-size:65px; ">😃</div>

        @elseif($correct==3)
        <h2 class="text-center">Good</h2>
        <div style="font-size:65px; ">🥰</div>
        @elseif($correct==4)
        <h3 class="text-center">Very Good</h3>
        <div style="font-size:65px; ">🥳</div>

        @else
        <h2 class="text-center">Outstanding</h2>
        <div style="font-size:65px; ">🤩</div>

        @endif
    </div>
    <div class="mt-5 row">
        <div class="col-md-4">
            <a href="{{route('quiz.index',$user_question->subject_id)}}" class="btn btn-success w-100">Try Again</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('home') }}" class="btn btn-success w-100 ">Go to Home</a>
        </div>
        <div class="col-md-4">
            <a href="{{route('gameplay.choose')}}" class="btn btn-success w-100">Choose A New Subject</a>
        </div>
    </div>
</div>
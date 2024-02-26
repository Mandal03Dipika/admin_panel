@extends('layouts.main')
@section('content')
<style>
    .startq_btn {
        position: absolute;
        bottom: 0;
        padding-block: 10px;
        font-size: 40px;
        font-weight: 900;
        color: #050000;
        background: #f7c8c882;
        text-align: center;
        border-radius: 3px;
        width: 100%;
        vertical-align: middle;
        transition: all 0.7s ease-in-out;
        vertical-align: middle;
        transition: all 0.7s ease-in-out;
    }

    .startq_btn:hover {
        height: 200px;
    }

    .st_cards {
        position: relative;
        height: 400px;
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(5px);
        transition: all 0.3s ease-in-out;
    }

    .st_cards:hover {
        box-shadow: 0 0 5px 10px #57474755;
    }
</style>
<div class="container">
    <div class="pt-5 text-center" style="font-size: 55px; ">Choose Subjects</div>
    <div class="gap-3 row justify-content-center">
        @foreach($subjects as $subject)
        <div class="col-md-4 " style="width: 350px ;  height: 400px;">
            <div class="m-5 mx-auto st_cards card align-items-center h-75">
                <img data-sid="{{ $subject->id }}" src="{{ asset('upload/subject') . '/' . $subject->image }}"
                    class="img-fluid card-img h-100" alt="" width="200">
                <div class="startq_btn position-absolute">
                    {{-- <a href="{{route('gameplay.index',$subject->id)}}">{{$subject->name}}</a> --}}
                    <a href="{{route('quiz.index',$subject->id)}}">{{$subject->name}}</a>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection
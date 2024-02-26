@extends('layouts.main')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div style="font-size: 30px;">Edit Your Subject Here!!</div>
        <a href="{{route('subject.index')}}" class="m-3 btn btn-warning">Index Page</a>
    </div>
    <div class="container m-3 border border-dark bg-warning-subtle">
        <form action="{{route('subject.update',$subject->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{$subject->name}}" name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input name="image" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Selected Image</label>
                <img style="width:100px;height:100px" src="{{asset('upload/subject').'/'.$subject->image}}" alt="">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-pen-fancy"></i>Update</button>
        </form>
    </div>
</div>
@endsection

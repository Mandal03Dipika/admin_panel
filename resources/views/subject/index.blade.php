@extends('layouts.main')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div style="font-size: 30px; ">List of Subjects</div>
        <a href="{{route('subject.create')}}" class="m-3 btn btn-warning"><i class="fa-solid fa-plus"></i>Add</a>
    </div>
    <table class="table table-dark table-hover">
        <tr>
            <th>Sl.No.</th>
            <th>Subject</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($subjects as $key => $subject)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$subject->name}}</td>
            <td><img style="width:100px;height:100px" src="{{asset('upload/subject').'/'.$subject->image}}" alt=""></td>
            <td><a href="{{route('subject.edit',$subject->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="{{route('subject.delete',$subject->id)}}" class="btn btn-danger"><i
                        class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection

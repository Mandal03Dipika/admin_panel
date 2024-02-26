@extends('layouts.main')
@section('content')
<h1 class="text-center">User</h1>
<a href="{{route('user.create')}}" class="btn btn-warning">Add</a>
<table class="table table-dark table-hover">
    <tr>
        <th>Sl.No.</th>
        <th>Name</th>
        <th>Role</th>
        <th>Email</th>
        <th>Password</th>
        <th colspan=2>Action</th>
    </tr>
    @foreach ($users as $key => $user)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->password}}</td>
        <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-success">Edit</a></td>
        <td><a href="{{route('user.delete',$user->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
</table>
@endsection
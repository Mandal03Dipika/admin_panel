@extends('layouts.main')
@section('content')
<h1 class="text-center">User Edit</h1>
<div class="container">
    <form action="{{route('user.update',$user->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input value="{{$user->name}}" name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input value="{{$user->role}}" name="role" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input value="{{$user->email}}" name="email" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input value="{{$user->password}}" name="password" type="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
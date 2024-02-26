@extends('layouts.main')
@section('content')
<h1 class="text-center">User Create</h1>
<div class="container">
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input name="role" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password" type="password" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
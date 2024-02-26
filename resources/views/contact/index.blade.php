@extends('layouts.main')
@section('content')
<div class="container p-2">
    <form action="{{route('contact.store')}}">
        @csrf
        <div class="d-flex justify-content-center align-items-center" style="font-size:30px">Contact US</div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Your Name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
        </div>
        <button id="feedback" type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection
{{-- @push('script')
toaster.success('Submitted');
@endpush --}}
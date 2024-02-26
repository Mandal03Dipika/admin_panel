@extends('layouts.main')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between">
        <div style="font-size: 30px; ">List of Qusetions</div>
        <a href="{{route('question.create')}}" class="m-3 btn btn-warning">Create Question</a>
    </div>
    <div id="search_result_panel" class="p-4 my-4 card bg-warning-subtle">
        <form action="" method="">
            <div class="d-flex">
                <div class="col-md-4">
                    <select name="subject_id" id="subject_id" class="form-control">
                        <option value="">- Select Subject</option>
                        @foreach ($subjects as $subject)
                        <div class="row">
                            <option value="{{$subject->id}}" {{$subject->id==old('subject_id') ?
                                'Selected':''}}>{{$subject->name}}</option>
                        </div>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="weightage" id="weightage" class="form-select" aria-label="Default select example">
                        <option selected>- Select Level</option>
                        @foreach ([1,2,3] as $data)
                        <option value="{{$data}}">{{$data}}</option>
                        @endforeach
                    </select>
                </div>
                <div id='search' class="search btn btn-success ms-4"><i class="fa fa-search"></i>Search</div>
            </div>
        </form>
    </div>
    <div class="card" id="result_panel">
        {{-- @include('question.partial.table_index') --}}
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
        $('#search').on('click',function(e){
            // e.preventDefault();
            var subject_id = $('#subject_id').val();
            var weightage = $('#weightage').val();
            if(subject_id == '')
            {
                //console.log('no value');
                alert('Select Choices');
                return;
            }
            var url = "{{route('question.search',[':id',':id1'])}}";
            console.log(url);
            url = url.replace(':id',subject_id);
            console.log(url);
            url = url.replace(':id1',weightage);
            console.log(url);
            $.ajax({
                url:url,
                type:'GET',
                success:function(response){
                    if(response.status==200){
                        toastr.success('I am done')
                        $('#result_panel').html(response.htmlData);
                    }
                    else{
                        $('#result_panel').html('No Data Found');
                    }
                   console.log(response.htmlData);
                }
            })
        });
    });
</script>
@endpush
<table class="table table-dark table-hover">
    <tr>
        <th>Sl.No</th>
        <th>Weightage</th>
        <th>Question Image</th>
        <th>Question</th>
        <th>A Image</th>
        <th>Option A</th>
        <th>B Image</th>
        <th>Option B</th>
        <th>C Image</th>
        <th>Option C</th>
        <th>D Image</th>
        <th>Option D</th>
        <th>Action</th>
    </tr>
    @foreach($questions as $key=>$question)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$question['weightage']}}</td>
        <td><img class="img-fluid" style="width:50px;height:50px"
                src="{{asset('upload/question').'/'.$question->image}}" alt=""></td>
        <td>{{$question->question_text}}</td>
        <td><img class="img-fluid" style="width:50px;height:50px"
                src="{{asset('upload/question').'/'.$question->a_image}}" alt=""></td>
        <td>{!! $question->correct_ans == 'option_a' ? '<i class="fa-solid fa-circle-check"
                style="color: #7baf0c;"></i>' :
            '' !!} {{($question->option_a)}}</td>
        <td><img class="img-fluid" style="width:50px;height:50px"
                src="{{asset('upload/question').'/'.$question->b_image}}" alt=""></td>
        <td>{!! $question->correct_ans == 'option_b' ? '<i class="fa-solid fa-circle-check"
                style="color: #7baf0c;"></i>' :
            '' !!} {{($question->option_b)}}</td>
        <td><img class="img-fluid" style="width:50px;height:50px"
                src="{{asset('upload/question').'/'.$question->c_image}}" alt=""></td>
        <td>{!! $question->correct_ans == 'option_c' ? '<i class="fa-solid fa-circle-check"
                style="color: #7baf0c;"></i>' :
            '' !!} {{($question->option_c)}}</td>
        <td><img class="img-fluid" style="width:50px;height:50px"
                src="{{asset('upload/question').'/'.$question->d_image}}" alt=""></td>
        <td>{!! $question->correct_ans == 'option_d' ? '<i class="fa-solid fa-circle-check"
                style="color: #7baf0c;"></i>' :
            '' !!} {{($question->option_d)}}</td>
        <td><a href="{{route('question.edit',$question->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a> <a
                href="{{route('question.delete',$question->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
    @endforeach
</table>
@extends('layouts.admin')

@section('content')

<h3>Comments Panel</h3>

  @if(count($comments) > 0)
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Post</th>
            <th>Post Title</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($comments as $comment)
            <tr>
              <td>{{$comment->id}}</td>

              <td>{{$comment->email}}</td>
              <td>{{ $comment->body}}</td>
              <td><a href="/post/{{$comment->post->id}}">View Post</a></td>
              <td>{{$comment->post->title}}</td>
              <td>{{$comment->created_at->addHours(6)->toDayDateTimeString()}}</td>



              <td>
                @if ($comment ->is_active == 1)
                    {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}
                      <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                          {!! Form::submit('Un-approve', ['class' => 'btn btn-warning']) !!}
                        </div>
                    {!! Form::close() !!}

                  @else

                    {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}
                      <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                          {!! Form::submit('approve', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}

                @endif
              </td>

              <td>
                  {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\PostCommentsController@destroy', $comment->id]]) !!}
                    <input type="hidden" name="is_active" value="1">
                      <div class="form-group">
                        {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
                      </div>
                  {!! Form::close() !!}

              </td>



            </tr>
          @endforeach
        </tbody>

      </table>

        @else
        <h1 class="text-center"> No Comments</h1>

  @endif
@endsection



@section('footer')

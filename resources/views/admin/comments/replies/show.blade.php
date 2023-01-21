@extends('layouts.admin')

@section('content')


    @if(count($replies) > 0)
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>

            <th>Email</th>
            <th>Reply</th>
            <th>Post</th>
            <th>Post Title</th>
          </tr>
        </thead>

        <tbody>
          @foreach($replies as $reply)

            <tr>
              <td>{{$reply->id}}</td>

              <td>{{$reply->email}}</td>
              <td>{{ $reply->body}}</td>
              <td><a href="/post/{{$reply->comment->post->id}}">View Post</a></td>


              <td>
                @if ($reply ->is_active == 1)
                    {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\CommentRepliesController@update', $reply->id]]) !!}
                      <input type="hidden" name="is_active" value="0">
                        <div class="form-group">
                          {!! Form::submit('Un-approve', ['class' => 'btn btn-warning']) !!}
                        </div>
                    {!! Form::close() !!}

                  @else

                    {!! Form::open(['method'=>'PATCH', 'action'=> ['App\Http\Controllers\CommentRepliesController@update', $reply->id]]) !!}
                      <input type="hidden" name="is_active" value="1">
                        <div class="form-group">
                          {!! Form::submit('approve', ['class' => 'btn btn-success']) !!}
                        </div>
                    {!! Form::close() !!}

                @endif
              </td>

              <td>

                  {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\CommentRepliesController@destroy', $reply->id]]) !!}
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
        <h1 class="text-center"> No Replies</h1>
      @endif

@endsection



@section('footer')

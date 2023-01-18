@extends('layouts.admin')

@section('content')

<h3>Comments Panel</h3>

  @if(count($comments) > 0)
    <table class="table table-bordered table-striped">
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
            </tr>
          @endforeach
        </tbody>

      </table>

        @else
        <h1 class="text-center"> No Comments</h1>

  @endif
@endsection



@section('footer')

@extends('layouts.admin')

@section('content')

    <h3>Posts Panel</h2>


    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>PHOTO</th>
          <th>OWNER</th>
          <th>CATEGORY</th>
          <th>TITLE</th>
          <th>BODY</th>
          <th>POST</th>
          <th>COMMENT</th>
          <th>CREATED</th>
          <th>UPDATED</th>

        </tr>
      </thead>
      <tbody>

        <?php if ($posts): ?>
  @include('includes.tinyeditor')
          <?php foreach ($posts as $post): ?>
              <tr>
                <td>{{$post->id}}</td>
                <td> <img height="70" src="{{$post->photo ? $post->photo->file : 'http://place-hold.it/300'}}" alt="No User Photo"> </td>
                <td><a href="/admin/posts/{{$post->id}}/edit">{{ $post->user ? $post->user->name : ''}}</a></td>
                <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                <td>{{$post->title}}</td>
                <td>{{\Illuminate\Support\Str::limit($post->body, 30)}}</td>
                <td><a href="/post/{{$post->slug}}">View Post</a></td>
                <td><a href="/admin/comments/{{$post->id}}">View Comment</a></td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
              </tr>
          <?php endforeach; ?>

        <?php endif; ?>

      </tbody>
    </table>

    <!-- for paginations -->
    <div class="row">
           <div class="col-sm-6 col-sm-offset-5">
              {{$posts->links()}}
           </div>
    </div>


@stop

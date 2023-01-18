@extends('layouts.admin')

@section('content')

    <h1>posts page</h1>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>PHOTO</th>
          <th>Owner</th>
          <th>CATEGORY</th>
          <th>TITLE</th>
          <th>BODY</th>
          <th>CREATED</th>
          <th>UPDATED</th>

        </tr>
      </thead>
      <tbody>

        <?php if ($posts): ?>

          <?php foreach ($posts as $post): ?>
              <tr>
                <td>{{$post->id}}</td>
                <td> <img height="70" src="{{$post->photo ? $post->photo->file : 'http://place-hold.it/300'}}" alt="No User Photo"> </td>
                <td><a href="/admin/posts/{{$post->id}}/edit">{{ $post->user ? $post->user->name : ''}}</a></td>
                <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                <td>{{$post->title}}</td>
                <td>{{\Illuminate\Support\Str::limit($post->body, 15)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
              </tr>
          <?php endforeach; ?>

        <?php endif; ?>

      </tbody>
    </table>


@stop

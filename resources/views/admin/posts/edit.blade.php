@extends('layouts.admin')

@section('content')

    <h1>Edit page</h1>
  <div class="row">
      <div class="col-sm-3">
          <img height="200" width="200" src="{{$post->photo ? $post->photo->file : 'http://place-hold.it/300'}}" class="img-resoposive img-rounded" alt="">
      </div>

    <div class="col-sm-9">
      {!! Form::model($post, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminPostsController@update', $post->id], 'files' => 'true']) !!}
        {!! csrf_field() !!}

              <div class="form-group">
                  {!! Form::label('title', 'Title: ') !!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
               {!! Form::label('category_id', 'Category:') !!}
               {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
           </div>
              <div class="form-group">
                  {!! Form::label('photo_id', 'Photo: ') !!}
                  {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('body', 'Description: ') !!}
                  {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 6]) !!}
              </div>

              <div class="form-group">
                {!! Form::submit('Update Post', ['class' => 'btn btn-info col-sm-5']) !!}

              {!! Form::close() !!}

                  <!-- delete user form -->
                  {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\AdminPostsController@destroy', $post->id]]) !!}
                  {!! csrf_field() !!}
                            {!! Form::submit('Delete User', ['class' => 'btn btn-danger pull-right col-sm-5']) !!}
                  {!! Form::close() !!}
              </div>

      </div>
  </div>

      <div class="row">
      @include('includes.form-error')
      </div>
 </div>

@stop

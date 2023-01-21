@extends('layouts.admin')

@section('content')


  <h1 class="page-header">Create Post</h1>
    @include('includes.tinyeditor')
      <div class="col-md-12">
        <div class="col-md-offset">
            {!! Form::open(['method'=>'POST', 'action'=> ['App\Http\Controllers\AdminPostsController@store'],'files'=>'true']) !!}
            {!! csrf_field() !!}
            <div class="form-group">
                {!! Form::label('title', 'Title: ') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
             {!! Form::label('category_id', 'Category:') !!}
             {!! Form::select('category_id', [''=>'Choose Categories']+ $categories, 0, ['class'=>'form-control']) !!}
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
              {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
      </div>

      <div class="row">
      @include('includes.form-error')
      </div>


@stop

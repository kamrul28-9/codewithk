@extends('layouts.admin')

@section('content')

    <h1>create page</h1>

    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=> ['App\Http\Controllers\AdminPostsController@store'],'files'=>true]) !!}
        {!! csrf_field() !!}
          <div class="container" style="">
              <div class="form-group">
                  {!! Form::label('title', 'Title: ') !!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
               {!! Form::label('category_id', 'Category:') !!}
               {!! Form::select('category_id', ['Undefiend Category'=>'Choose Categories'], 0, ['class'=>'form-control']) !!}
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
                {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
              </div>
          </div>
        {!! Form::close() !!}
      </div>

      <div class="row">
      @include('includes.form-error')
      </div>

@stop

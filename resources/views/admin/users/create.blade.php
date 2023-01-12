@extends('layouts.admin')

@section('content')


  <h1>Create Users</h1>
    <div class="row">
        {!! Form::open(['method'=>'POST', 'action'=> ['App\Http\Controllers\AdminUsersController@store'],'files'=>true]) !!}
        {!! csrf_field() !!}
          <div class="container" style="">
              <div class="form-group">
                  {!! Form::label('name', 'User Name') !!}
                  {!! Form::text('name', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('email', 'User Email') !!}
                  {!! Form::email('email', null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('role_id', 'User Role') !!}
                  {!! Form::select('role_id',['User Has No Role'=>'Choose Options']+ $roles, 0, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('is_active', 'User Status') !!}
                  {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('password', 'User Password') !!}
                  {!! Form::password('password', ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                {!! Form::label('photo_id', 'Upload File') !!}
                {!! Form::file('photo_id') !!}
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



@endsection

@section('footer')



@endsection

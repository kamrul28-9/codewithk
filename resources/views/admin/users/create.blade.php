@extends('layouts.admin')

@section('content')


  <h1 class="page-header">Create User</h1>
      <div class="col-md-10 mb-5">
          <div class="col-md-offset-3">
              {!! Form::open(['method'=>'POST', 'action'=> ['App\Http\Controllers\AdminUsersController@store'],'files'=>true]) !!}
              {!! csrf_field() !!}
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
              {!! Form::close() !!}
          </div>
        </div>

        <div class="row">
          @include('includes.form-error')
        </div>



@endsection

@section('footer')



@endsection

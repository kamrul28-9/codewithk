@extends('layouts.admin')

@section('content')

    <h1 style="text-align:center;">Edit User</h1>

    <div class="row">
      <div class="col-lg-2">
          <img height="170" width="170" src="{{$user->photo ? $user->photo->file : 'http://place-hold.it/300'}}" class="img-resoposive img-rounded" alt="">
      </div>

      <div class="col-lg-10">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminUsersController@update', $user->id,], 'files' => 'true']) !!}

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
                  {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
              </div>
              <div class="form-group">
                  {!! Form::label('is_active', 'User Status') !!}
                  {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control']) !!}
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
                {!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}
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

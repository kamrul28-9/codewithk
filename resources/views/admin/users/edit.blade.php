@extends('layouts.admin')

@section('content')

    <?php if (Session::has('upadated_user')): ?>
        <p class="alert alert-info" >{{session('upadated_user')}}</p>
    <?php endif; ?>
    <h1 style="text-align:center;">Edit User</h1>

    <div class="row">
      <div class="col-lg-3">
          <img height="200" width="200" src="{{$user->photo ? $user->photo->file : 'http://place-hold.it/300'}}" class="img-resoposive img-rounded" alt="">
      </div>

      <div class="col-lg-9">
        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminUsersController@update', $user->id], 'files' => 'true']) !!}

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
                    {!! Form::submit('Update User', ['class' => 'btn btn-info col-sm-5']) !!}
              </div>
              {!! Form::close() !!}


                <div class="form-group">
                    <!-- delete user form -->
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}
                    {!! csrf_field() !!}
                              {!! Form::submit('Delete User', ['class' => 'btn btn-danger pull-right col-sm-5']) !!}
                    {!! Form::close() !!}
                </div>
        </div>

      </div>


     <div class="row">
       @include('includes.form-error')
     </div>




@endsection

@section('footer')



@endsection

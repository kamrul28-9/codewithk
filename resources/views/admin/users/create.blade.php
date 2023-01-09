@extends('layouts.admin')

@section('content')


  <h1>Create User</h1>

  {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminUsersController@store']) !!}
    <div class="form-gorup">
        {!! Form::label('name', 'User Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-gorup">
      {!! Form::submit('Create User', ['class' => 'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}

@endsection

@section('footer')



@endsection

@extends('layouts.admin')

@section('content')


    <div class="col-sm-6">
      {!! Form::model($category, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\AdminCategoriesController@update', $category->id]]) !!}
      {!! csrf_field() !!}
            <div class="form-group">
                {!! Form::label('name', 'Category Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::submit('Update Category', ['class' => 'btn btn-info col-sm-6']) !!}
            </div>
            {!! Form::close() !!}


            <!-- delete category -->
            {!! Form::open(['method'=>'DELETE', 'action'=> ['App\Http\Controllers\AdminCategoriesController@destroy', $category->id]]) !!}
            {!! csrf_field() !!}
                      {!! Form::submit('Delete Category', ['class' => 'btn btn-danger col-sm-6']) !!}
            {!! Form::close() !!}
    </div>






@endsection

@section('footer')
@endsection

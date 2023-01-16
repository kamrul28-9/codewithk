@extends('layouts.admin')

@section('content')


    <div class="col-sm-6">
      {!! Form::open(['method'=>'POST', 'action'=> ['App\Http\Controllers\AdminCategoriesController@store']]) !!}
      {!! csrf_field() !!}
            <div class="form-group">
                {!! Form::label('name', 'Category Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
              {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
            </div>
      {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
      @if($categories)

      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>CREATED</th>
            <th>UPDATED</th>
          </tr>
        </thead>

        <tbody>
          @foreach($categories as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td><a href="/admin/categories/{{$category->id}}/edit">{{$category->name}}</a></td>
              <td>{{$category->created_at ? $category->created_at->diffForHumans() : "No Date Fixed"}}</td>
              <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : "Not Update Yet"}}</td>
            <tr>
          @endforeach
        </tbody>

      </table>

      @endif
    </div>

@endsection

@section('footer')
@endsection

@extends('layouts.admin')

@section('content')



    <div class="row">
      @if($photos)

      <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
          </tr>
        </thead>

        <tbody>
          @foreach($photos as $photo)
            <tr>
              <td>{{$photo->id}}</td>
              <td><img height="50" src="{{$photo->file}}" alt="No picture loaded"></td>
              <td>{{$photo->created_at ? $photo->created_at : "No Date"}}</td>
              <td>
                {!! Form::open(['method'=>'POST', 'action'=> ['App\Http\Controllers\AdminMediasController@store'], $photo->id]) !!}

                  <div class="form-group">
                      {!! Form::submit('DELETE', ['class' => 'btn btn-danger']) !!}
                  </div>
                {!! Form::close() !!}

              </td>
            <tr>
          @endforeach
        </tbody>

      </table>

      @endif
    </div>

@endsection

@section('footer')
@endsection

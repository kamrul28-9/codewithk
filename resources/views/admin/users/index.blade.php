@extends('layouts.admin')

@section('content')

  <h1>Users</h1>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>PHOTO</th>
          <th>NAME</th>
          <th>E-MAIL</th>
          <th>ROLE</th>
          <th>STATUS</th>
          <th>CREATED</th>
          <th>UPDATED</th>
        </tr>
      </thead>
      <tbody>

        <?php if ($users): ?>

          <?php foreach ($users as $user): ?>
              <tr>
                <td>{{$user->id}}</td>
                <td> <img height="50" src="{{$user->photo ? $user->photo->file : 'No User Photo'}}" alt="No User Photo"> </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name ?? 'User Has No Role'}}</td>
                <td>{{$user->is_active == 1 ? 'Active': 'Not Active'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
              </tr>
          <?php endforeach; ?>

        <?php endif; ?>

      </tbody>
    </table>

        @endsection

@section('footer')



@endsection

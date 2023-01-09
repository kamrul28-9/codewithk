@extends('layouts.admin')

@section('content')

  <h1>Users</h1>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>NAME</th>
          <th>E-MAIL</th>
          <th>ROLE</th>
          <th>ACTIVE</th>
          <th>CREATED</th>
          <th>UPDATED</th>
        </tr>
      </thead>
      <tbody>

        <?php if ($users): ?>

          <?php foreach ($users as $user): ?>
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1 ? 'Still Active': 'No Actibity Now'}}</td>
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

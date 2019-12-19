@extends('layouts.adminapp')

@section('users')

<thead>
  <tr>
    <th>#</th>
    <th>Nombre</th>
    <th>email</th>
    <th>rol</th>
  </tr>
</thead>
<tbody>
  @foreach($users as $u)
  <tr>
    <td>{{$u->id}}</td>
    <td>{{$u->name}}</td>
    <td>{{$u->email}}</td>
    <td><a href="{{route('admin.edit', $u->id)}}">{{$u->role}}</a></td>
  </tr>
  @endforeach
</tbody>
@endsection

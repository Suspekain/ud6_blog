@extends('layouts.adminapp')

@section('users')
<form method="POST" action="{{route('admin.update', $user->id)}}">
  @csrf
  @method('PATCH')
  Cambiar rol: <input type="text" name="rol" value="{{$user->role}}"><br><br>
  <input type="submit" value="Editar">
</form>
@endsection

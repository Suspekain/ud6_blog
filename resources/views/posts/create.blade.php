@extends('layouts.app')

@section('content')
<br>
<form method="POST" action="">
  @csrf
  Titulo: <input type="text" name="title"><br>
  Subtitulo: <input type="text" name="excerpt"><br>
  Texto: <input type="text" name="body"><br>
  Imagen: <input type="file" name="imagen"><br>
  Categoria: <select name="category">
    @foreach($categorias as $c)
    <option value="{{$c->id}}">{{$c->id}}</option>
    @endforeach
  </select><br>
  <button type="submit">Crear</button>
</form>
@endsection

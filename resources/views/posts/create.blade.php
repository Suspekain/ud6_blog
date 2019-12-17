@extends('layouts.app')

@section('content')
<br>
<form method="POST" action="{{route('post.store')}}">
  @csrf
  Titulo: <input type="text" name="title"><br><br>
  Subtitulo: <input type="text" name="excerpt"><br><br>
  Texto: <input type="text" name="body"><br><br>
  Imagen: <input type="file" name="imagen"><br><br>
  Categoria: <select name="category"><br>
    @foreach($categorias as $c)
    <option value="{{$c->id}}">{{$c->id}}</option>
    @endforeach
  </select><br><br>
  <button type="submit">Crear</button><br><br>
</form>
@endsection

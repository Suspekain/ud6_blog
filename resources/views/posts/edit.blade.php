@extends('layouts.app')

@section('content')
<br>
<form method="POST" action="{{route('post.update', $post->id)}}">
  @csrf
  @method('PATCH')
  Titulo: <input type="text" name="title" value="{{$post->title}}"><br><br>
  Subtitulo: <input type="text" name="excerpt" value="{{$post->excerpt}}"><br><br>
  Texto: <input type="text" name="body" value="{{$post->body}}"><br><br>
  Imagen: <input type="file" name="imagen" value="{{$post->imagen}}"><br><br>
  Categoria: <select name="category" value="{{$post->category}}"><br>
    @foreach($categorias as $c)
    <option value="{{$c->id}}">{{$c->id}}</option>
    @endforeach
  </select><br><br>
  <input type="submit" value="Editar"> <br><br>
</form>
@endsection

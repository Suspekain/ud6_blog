@extends('layouts.app')

@section('content')
<br>
<a href="{{route('post.create')}}"><button type="button" class="btn btn-secondary">Nuevo Post</button></a><br><br>
<table class="table table-condensed">
  <thead>
    <tr>
      <th>Id</th>
      <th>Titulo</th>
      <th>Fecha/Hora</th>
      <th style="width:15px"></th>
      <th style="width:15px"></th>
      <th style="width:15px"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $p)
    <tr>
      <td>{{$p->id}}</td>
      <td>{{$p->title}}</td>
      <td>{{date("j/m/Y H:i:s", strtotime($p->published_at))}}</td>
      <td>
        <a title="Ver" href="{{route('post.show',$p->id)}}"><i class="fa fa-eye" style="color:black"></i></a>
      </td>
      <td>
        <a title="Editar" href="{{route('post.edit', $p->id)}}"><i class="fa fa-pencil" style="color:black"></i></a>
      </td>
      <td>
        <form action="{{route('post.destroy', $p->id)}}" method="post">
          @csrf
          @method('DELETE')
          <input type="submit" value="Eliminar">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection

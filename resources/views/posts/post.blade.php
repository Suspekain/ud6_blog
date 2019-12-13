@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <a href="{{route('post.index')}}">lista</a>
    <h2>Post nº {{$post->id}}</h2>
    <li><b>Titulo:</b> {{$post->title}}</li>
    <li><b>Subitulo:</b> {{$post->excerpt}}</li>
    <li><b>Parrafo:</b> {{$post->body}}</li>
    <li><b>Imagen:</b> <img src="{{$post->image}}" alt="{{$post->image}}"></li>
  </div>
</div>
@endsection

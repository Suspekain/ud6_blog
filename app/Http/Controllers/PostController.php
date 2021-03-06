<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Category;

class PostController extends Controller {
  // LISTA
  public function index() {
    $posts=Post::all();
    return view('posts.index', ['posts' => $posts]);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  //SORTU
  public function create() {
    $categorias = Category::all();
    return view('posts.create', ['categorias'=>$categorias]);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  //GORDE BERRIA
  public function store(Request $request) {
    $post = new Post;
    $post->title = $request->input('title');
    $post->excerpt = $request->input('excerpt');
    $post->body = $request->input('body');
    $post->image = $request->file('img');
    $post->category_id = $request->get('category');
    $post->user_id = Auth::user()->id;
    $post->save();

    $posts = Post::where('user_id', Auth::user()->id)->get();
    return redirect(route('post.index', ['posts'=>$posts]));
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  //BAT IKUSI
  public function show($id) {
    return view('posts.post', ['post' => Post::find($id)]);
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  //ALDATU
  public function edit($id) {
    $post = Post::find($id);
    $category = Category::all();
    return view('posts.edit', ['post'=>$post, 'categorias'=>$category]);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  //ALDAKETA GORDE
  public function update(Request $request, $id) {
    $post = Post::find($id);
    $post->title = $request->input('title');
    $post->excerpt = $request->input('excerpt');
    $post->body = $request->input('body');
    $post->image = $request->file('img');
    $post->category_id = $request->get('category');
    $post->user_id = Auth::user()->id;
    $post->save();

    $posts = Post::all();
    return view('posts.index',['posts'=>$posts]);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    Post::where("id",$id)->delete();
    $posts=Post::all();
    return view("posts.index",['posts'=>$posts]);
  }
}

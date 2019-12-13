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

  //SORTU
  public function create() {
    $categorias = Category::all();
    return view('posts.create', ['categorias'=>$categorias]);
  }

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

  //BAT IKUSI
  public function show($id) {
    return view('posts.post', ['post' => Post::find($id)]);
  }

  //ALDATU
  public function edit($id) {
    $post = Post::find($id);
    $category = Category::all();
    return view('posts.edit', ['post'=>$post, 'categorias'=>$category]);
  }

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

    $post = Post::all();
    return view('posts.index',['post'=>$post]);
  }

  public function destroy($id)
  {
    //
  }
}

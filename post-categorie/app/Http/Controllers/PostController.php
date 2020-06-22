<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
      $posts = Post::all();
      return view('home', compact('posts'));
    }

    public function edit($id){
      $post = Post::findOrFail($id);
      $categories = Category::all();
      return view('editpost', compact('post', 'categories'));
    }

    public function update(Request $request, $id){

      $validateData = $request -> validate([
        'title' => 'required',
        'text' => 'required',
        'category_id' => 'required'
      ]);

      Post::whereId($id) -> update($validateData);
      return redirect() -> route('home');
    }

    public function create() {
      $categories = Category::all();
      return view('createpost', compact('categories'));
    }

    public function store(Request $request) {

      $validateData = $request -> validate([
        'title' => 'required',
        'text' => 'required',
        'category_id' => 'required'
      ]);

      $post = new Post;
      $post['title'] = $validateData['title'];
      $post['text'] = $validateData['text'];
      $post['category_id'] = $validateData['category_id'];

      $post -> save();

      return redirect() -> route('home');

    }

    public function delete($id) {
      $post = Post::findOrFail($id);

      $post -> delete();
      return redirect() -> route('home');
    }
}

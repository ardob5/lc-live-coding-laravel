@extends('layouts.main_layout')

@section('content')
  <a href="{{route('create_post')}}">Create New Post</a>
  <ul>
    @foreach ($posts as $post)
      <li>
        <a href="{{route('edit_post', $post['id'])}}">Title: {{ $post['title'] }}</a> <br>
        Text: {{ $post['text'] }} <br>
        Category: {{ $post -> category -> name }}
        <a href="{{route('delete_post', $post['id'])}}">DELETE ME</a>
      </li>
    @endforeach
  </ul>
@endsection

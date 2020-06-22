@extends('layouts.main_layout')

@section('content')
  <form action="{{route('update_post', $post['id'])}}" method="post">
    @csrf
    @method('POST')

    <label for="title">TITLE</label>
    <input type="text" name="title" value=" {{ $post['title'] }}"> <br>

    <label for="text">TEXT</label>
    <input type="text" name="text" value="{{ $post['text']}}"> <br>

    <label for="category_id">CATEGORY</label>
    <select name="category_id">
      @foreach ($categories as $category)
        <option value="{{$category['id']}}"
          @if ($category['id'] == $post -> category_id )
            selected
          @endif
        >{{ $category['name'] }}</option>
      @endforeach
    </select> <br>


    <input type="submit" name="submit" value="UPDATE">




  </form>
@endsection

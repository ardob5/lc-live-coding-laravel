@extends('layouts.main_layout')

@section('content')
  <form action="{{route('store_post')}}" method="post">
    @csrf
    @method('POST')

    <label for="title">TITLE</label>
    <input type="text" name="title" value=""> <br>

    <label for="text">TEXT</label>
    <input type="text" name="text" value=""> <br>

    <label for="category_id">CATEGORY</label>
    <select name="category_id">
      @foreach ($categories as $category)
        <option value="{{$category['id']}}">{{ $category['name'] }}</option>
      @endforeach
    </select> <br>


    <input type="submit" name="submit" value="CREATE">
  </form>
@endsection

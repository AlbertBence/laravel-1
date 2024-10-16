@extends('layout')

@section('content')
@error('name')
    <div class="alert alert-warning">{{$message}}</div>
@enderror

<form action="{{ route('tags.update', $tag->id) }}" method="POST">
    @csrf
    @method('PUT')
    <fieldset>
        <label for="name">Címke név</label>
        <input type="text" name="name", id="name" value="{{old('name', $tag->name)}}">
    </fieldset>
    <button type="submit">Ment</button>
</form>
@endsection
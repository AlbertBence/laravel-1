@extends('layout')

@section('content')
<h1>Új Kategória</h1>

@error('name')
    <div class="alert alert-warning">{{$message}}</div>
@enderror

<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Kategória név</label>
        <input type="text" name="name", id="name">
    </fieldset>
    <button type="submit">Ment</button>
</form>
@endsection
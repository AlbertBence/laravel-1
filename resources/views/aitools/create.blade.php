@extends('layout')

@section('content')
<h1>Új AI Eszköz</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('aitools.store') }}" method="POST">
    @csrf
    <fieldset>
        <label for="name">Az AI eszköz neve</label>
        <input type="text" name="name", id="name">
    </fieldset>
    <fieldset>
        <label for="category_id">Kategória</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="description">Leírás</label>
        <textarea name="description", id="description"></textarea>
    </fieldset>
    <fieldset>
        <label for="link">Link</label>
        <input type="text" name="link", id="link">
    </fieldset>
    <fieldset>
        <label for="hasFreePlan">Van ingyenes változat?</label>
        <input type="checkbox" name="hasFreePlan", id="hasFreePlan">
    </fieldset>
    <fieldset>
        <label for="price">Ár (havonta Ft-ban)</label>
        <input type="number" name="price", id="price">
    </fieldset>
    <fieldset>
        <label for="tags">Címkék</label>
        <select name="tags[]" id="tags" multiple>
            @foreach ($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </fieldset>
    <button type="submit">Ment</button>
</form>
@endsection
@extends('layouts.main')

@section('content')

    <h3>{{ $category->id }}.{{ $category->title }}</h3>
    <br>
    <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('category.edit', $category->id) }} ">Edit</a>
    <br>
    <a href="{{ route('category.index') }}">Back</a>
    <div>
        <form action="{{ route('category.destroy', $category->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete">
        </form>
    </div>
@endsection

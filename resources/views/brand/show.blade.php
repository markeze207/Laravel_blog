@extends('layouts.main')

@section('content')

    <h3>{{ $brand->id }}.{{ $brand->name }}</h3>
    <br>
    <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('brand.edit', $brand->id) }} ">Edit</a>
    <br>
    <a href="{{ route('brand.index') }}">Back</a>

    <div>
        <form action="{{ route('brand.destroy', $brand->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete">
        </form>
    </div>

@endsection

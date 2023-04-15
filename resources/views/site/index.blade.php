@extends('layouts.main')

@section('content')

    <a href="{{ route('post.index') }}">Posts</a>
    <a href="{{ route('category.index') }}">Categories</a>
    <a href="{{ route('brand.index') }}">Brands</a>

@endsection

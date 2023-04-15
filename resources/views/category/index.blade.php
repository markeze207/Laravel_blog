@extends('layouts.main')

@section('content')
<a href="{{ route('category.create') }}">Create category</a>
@foreach($categories as $category)
    <a href="{{ route('category.show', $category->id) }}">{{ $category->id }}.{{ $category->title }}</a>
@endforeach
<a href="{{ route('site.index') }}">Back</a>
@endsection

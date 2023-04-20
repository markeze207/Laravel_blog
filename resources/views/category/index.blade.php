@extends('layouts.main')

@section('content')
    <div>
        <a href="{{ route('category.create') }}">Create category</a>
    </div>

    @foreach($categories as $category)
        <div><a href="{{ route('category.show', $category->id) }}">{{ $category->id }}.{{ $category->title }}</a></div>
    @endforeach
    <div>
        {{ $categories->links() }}
    </div>

    <div>
        <a href="{{ route('site.index') }}">Back</a>
    </div>
@endsection

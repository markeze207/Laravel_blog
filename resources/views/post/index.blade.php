@extends('layouts.main')

@section('content')
<a href="{{ route('post.create') }}">Create post</a>
@foreach($posts as $post)
    <a href="{{ route('post.show', $post->id) }}">{{ $post->id }}.{{ $post->title }}</a>
@endforeach
<a href="{{ route('site.index') }}">Back</a>
@endsection

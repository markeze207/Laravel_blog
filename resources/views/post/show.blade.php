@extends('layouts.main')

@section('content')

<h3>{{ $post->id }}.{{ $post->title }}</h3>
<br>
<br>
<a href="{{ route('post.index') }}">Back</a>

@endsection

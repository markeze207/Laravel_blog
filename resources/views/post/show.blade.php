@extends('layouts.main')

@section('content')

<h3>{{ $post->id }}.{{ $post->title }}</h3>
<br>
<a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('post.edit', $post->id) }} ">Edit</a>
<br>
<a href="{{ route('post.index') }}">Back</a>
<div>
    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger" type="submit" value="Delete">
    </form>
</div>
@endsection

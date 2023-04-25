@extends('layouts.main')

@section('content')
    @if(count($posts) != 0)
        @foreach($posts as $post)
            <div><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}.{{ $post->title }}</a></div>
        @endforeach

        <div>
            {{ $posts->withQueryString()->links() }}
        </div>
    @else
        <div>
            <span>Нет постов</span>
        </div>
    @endif
    <div>
        <a href="{{ route('site.index') }}">Back</a>
    </div>
@endsection

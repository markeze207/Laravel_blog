@extends('layouts.main')

@section('content')

<form action="{{ route('post.update', $post->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" value="{{ $post->title }}" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Title">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{ $post->content }}</textarea>
            @error('content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" class="form-control" id="category">
                @foreach($categories as $category)
                    <option
                        {{ $category->id == $post->category_id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                            {{ $tag->id == $postTag->id ? 'selected' : '' }}
                        @endforeach
                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
            @error('tags')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</form>

@endsection

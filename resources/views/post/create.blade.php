@extends('layouts.main')

@section('content')

<form action="{{ route('post.store') }}" method="POST">
    @csrf
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input
                value=" {{ old('title') }} "
                type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Title">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Content</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3">{{ old('content') }}</textarea>
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
                        {{ old('category_id') == $category->id  ? 'selected' : '' }}
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
                        {{ old('tags') != null && in_array($tag->id, old('tags')) ? 'selected' : '' }}
                        value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</form>

@endsection

@extends('layouts.main')

@section('content')

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Title">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </form>

@endsection

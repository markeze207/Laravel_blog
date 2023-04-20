@extends('layouts.main')

@section('content')
    <div>
        <a href="{{ route('brand.create') }}">Create brand</a>
    </div>

    @foreach($brands as $brand)
        <div><a href="{{ route('brand.show', $brand->id) }}">{{ $brand->id }}.{{ $brand->name }}</a></div>
    @endforeach
    <div>
        {{ $brands->links() }}
    </div>

    <div>
        <a href="{{ route('site.index') }}">Back</a>
    </div>
@endsection

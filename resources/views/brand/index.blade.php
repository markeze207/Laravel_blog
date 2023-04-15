@extends('layouts.main')

@section('content')

<a href="{{ route('brand.create') }}">Create brand</a>

@foreach($brands as $brand)
    <a href="{{ route('brand.show', $brand->id) }}">{{ $brand->id }}.{{ $brand->name }}</a>
@endforeach
<a href="{{ route('site.index') }}">Back</a>
@endsection

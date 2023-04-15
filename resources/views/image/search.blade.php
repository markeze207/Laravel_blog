@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="nav__bar">
            <ul class="nav__bar-item">
                <li class="active">Site 1</a></li>
                <li><a href="#">Site 2</a></li>
                <li><a href="">Site 3</a></li>
                <li><a href="">Site 4</a></li>
            </ul>
        </div>
        <div class="search">
            <form method="GET" class="search-form" action="{{ route('image.find') }}">
                <input class="search-form__item" type="text" name="search" placeholder="Поиск">
            </form>
        </div>
        <p class="result__text">Поиск: {{ $_GET['search'] }}</p>
        <div class="photo__container">
            <a href="{{ route('image.show', $image->id) }}"><img src="http://127.0.0.1:5173/{{ $image->src }}" alt="{{ $image->name }}"></a>

        </div>
    </div>
@endsection

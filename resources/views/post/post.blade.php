@extends('layouts.main')

@section('content')

@if($postFindById)
    {{ $postFindById['title'] }}
@else
    {{ 'Нет такого поста' }}
@endif

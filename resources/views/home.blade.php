@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <div>
                           <div>
                               <a href="{{ route('post.index') }}">Posts</a>
                           </div>
                            <div>
                                <a href="{{ route('category.index') }}">Categories</a>
                            </div>
                            <div>
                                <a href="{{ route('brand.index') }}">Brands</a>
                            </div>
                            @if(auth()->user()->role == 'admin')
                                <div>
                                    <a href="{{ route('admin.index') }}">Admin panel</a>
                                </div>
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Halaman Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4 mb-3">
                <a href="/posts?category={{ $category->slug }}">
                    <div class="card text-bg-dark">
                        <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title flex-fill text-center p-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
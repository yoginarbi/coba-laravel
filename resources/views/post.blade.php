@extends('layouts.main')

@section('container')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1 class="mb-4">{{ $post->title }}</h1>
      <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
      </p>
      @if ($post->image)
      <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
      @else
      <img src="https://source.unsplash.com/1000x200?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
      @endif
      <article class="py-3">
        <p>{!! $post['body']; !!}</p>
      </article>

      <a href="/posts">Back to Posts</a>
    </div>
  </div>
</div>



@endsection
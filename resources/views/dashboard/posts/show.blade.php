@extends('dashboard.layouts.main')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h1 class="mb-4">{{ $post->title }}</h1>
      <a href="/dashboard/posts" class="btn btn-success"><i data-feather="arrow-left"></i> Back to all my posts</a>
      <a href="{{ route('posts.edit', [$post->slug]) }}" class="btn btn-warning"><i data-feather="edit"></i> Edit</a>
      <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger border-0" onclick="return confirm('Are you sure ?')"><i data-feather="x-circle"></i> Delete</button>
      </form>
      @if ($post->image)
      <div style="max-height: 350px; overflow:hidden;">
        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
      </div>
      @else
      <img src="https://source.unsplash.com/700x200?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="mt-3">
      @endif
      <article class="py-3">
        <p>{!! $post['body']; !!}</p>
      </article>

      {{-- <a href="/posts">Back to Posts</a> --}}
    </div>
  </div>
</div>
@endsection
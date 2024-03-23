@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
  <h2>My Posts</h2>
</div>
@if (session('success'))
<div class="alert alert-primary col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="table-responsive small col-lg-8">
  <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->category->name }}</td>
        <td>
          <a href="{{ route('posts.show', [$post->slug]) }}"><i data-feather="eye"></i></a>
          <a href="{{ route('posts.edit', [$post->slug]) }}"><i data-feather="edit"></i></a>
          <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="border-0" onclick="return confirm('Are you sure ?')"><i data-feather="x-circle"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
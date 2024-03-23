@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3 border-bottom">
  <h2>Edit Post</h2>
</div>

<div class="col-lg-8">
  <form method="post" action="{{ route('posts.update', [$post->slug]) }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title')
                is-invalid
            @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug')
                is-invalid
            @enderror" id="slug" name="slug" readonly required value="{{ old('slug', $post->slug) }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Slug</label>
      <select class="form-select" name="category_id">
        @foreach ( $categories as $category )
        @if (old('category_id', $post->category_id) == $category->id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
        <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endif
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Post Image</label>
      {{-- <input type="hidden" name="oldImage" value="{{ $post->image }}"> --}}
      @if ($post->image)
      <img src="{{ asset('storage/'.$post->image) }}" class="img-preview img-fluid mb-2 col-sm-5 d-block">
      @else
      <img class="img-preview img-fluid mb-3 col-sm-5">
      @endif
      <input class="form-control @error('image')
                    is-invalid
                @enderror" type="file" id="image" name="image" onchange="previewImage(event)">
      @error('image')
      <div class=" invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      @error('body')
      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="body" type="hidden" name="body" required value="{{ old('body', $post->body) }}">
      <trix-editor input="body"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
  </form>
</div>

<script>
  const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    function previewImage(event) {
    let reader = new FileReader();
    reader.onload = function() {
    let preview = document.querySelector('.img-preview');
    preview.src = reader.result;
    preview.style.display = 'block';
    document.getElementById('deleteIcon').style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
    }
    
    function deleteImage() {
    document.querySelector('.img-preview').src = '';
    document.querySelector('.img-preview').style.display = 'none';
    document.getElementById('deleteIcon').style.display = 'none';
    document.getElementById('image').value = '';
    }
</script>
@endsection
@extends('layout.dashboard')

@section('content')
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-9 col-lg-7">

        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Edit Blog</h5>
            </div>
            <div class="container">
              <form action="/dashboard/blogs/{{ $blog->slug }}" method="post" enctype="multipart/form-data" class="m-3">
                @method('put')
                  @csrf
                  <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                      name="title" required autofocus value="{{ old('title', $blog->title) }}">
                      @error('title')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" 
                        name="slug" required value="{{ old('slug', $blog->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                          @foreach ($categories as $category)
                            @if(old('category_id', $blog->category_id) == $category->id)
                              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                               <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div> 
                    <div class="mb-3">
                      <label for="image" class="form-label">Blog Image</label>
                      <input type="hidden" name="oldImage" value="{{ $blog->image }}">
                        @if ($blog->image)
                          <img src="{{ asset('storage/' . $blog->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                          <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                      name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    @error('body')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                      <input id="body" type="hidden" name="body" value="{{ old('body', $blog->body) }}">
                      <trix-editor input="body"></trix-editor>
                  </div> 
                  <button type="submit" class="btn btn-primary">Update blog</button>
                </form> 
            </div>

        </div>
    </div>
</div>

<script>

    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')
    
    title.addEventListener('change', function() {
        fetch('/dashboard/blogs/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
    document.addEventListener('trix-file-accept', function(e) {
       e.preventDefault();
    })

  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
  </script>

@endsection
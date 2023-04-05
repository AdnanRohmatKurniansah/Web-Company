@extends('layout.dashboard')

@section('content')
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-9 col-lg-7">

        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Edit About</h5>
            </div>
            <div class="container">
              <form action="/dashboard/abouts/{{ $about->id }}" method="post" enctype="multipart/form-data" class="m-3">
                @method('put')
                  @csrf
                  <div class="mb-3">
                      <label for="title" class="form-label">Title</label>
                      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" 
                      name="title" required autofocus value="{{ old('title', $about->title) }}">
                      @error('title')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Description</label>
                        @error('desc')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                          <input id="desc" type="hidden" name="desc" value="{{ old('desc', $about->desc) }}">
                          <trix-editor input="desc"></trix-editor>
                      </div> 
                    <div class="mb-3">
                      <label for="image" class="form-label">About Image</label>
                      <input type="hidden" name="oldImage" value="{{ $about->image }}">
                        @if ($about->image)
                          <img src="{{ asset('storage/' . $about->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                  <button type="submit" class="btn btn-primary">Update About</button>
                </form> 
            </div>

        </div>
    </div>
</div>

<script>
        
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
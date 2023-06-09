@extends('layout.dashboard')

@section('content')
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-9 col-lg-7">

        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Edit Service</h5>
            </div>
            <div class="container">
              <form action="/dashboard/services/{{ $service->id }}" method="post" enctype="multipart/form-data" class="m-3">
                @method('put')
                  @csrf
                  <div class="mb-3">
                      <label for="type" class="form-label">Type</label>
                      <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" 
                      name="type" required autofocus value="{{ old('type', $service->type) }}">
                      @error('type')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  <div class="mb-3">
                      <label for="desc" class="form-label">Description</label>
                      <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" 
                      name="desc" required autofocus value="{{ old('desc', $service->desc) }}">
                      @error('desc')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Service Image</label>
                      <input type="hidden" name="oldImage" value="{{ $service->image }}">
                        @if ($service->image)
                          <img src="{{ asset('storage/' . $service->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                  <button type="submit" class="btn btn-primary">Update Service</button>
                </form> 
            </div>

        </div>
    </div>
</div>

<script>
        
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
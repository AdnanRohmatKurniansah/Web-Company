@extends('layout.dashboard')

@section('content')
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-9 col-lg-7">

        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Edit Slide</h5>
            </div>
            <div class="container">
              <form action="/dashboard/slides" method="post" enctype="multipart/form-data" class="m-3">
                @method('put')
                  @csrf
                  <div class="mb-3">
                      <label for="mainTitle" class="form-label">MainTitle</label>
                      <input type="text" class="form-control @error('mainTitle') is-invalid @enderror" id="mainTitle" 
                      name="mainTitle" required autofocus value="{{ old('mainTitle', $slide->mainTitle) }}">
                      @error('mainTitle')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  <div class="mb-3">
                      <label for="subTitle" class="form-label">SubTitle</label>
                      <input type="text" class="form-control @error('subTitle') is-invalid @enderror" id="subTitle" 
                      name="subTitle" required autofocus value="{{ old('subTitle', $slide->subTitle) }}">
                      @error('subTitle')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Slide Image</label>
                      <input type="hidden" name="oldImage" value="{{ $slide->image }}">
                        @if ($slide->image)
                          <img src="{{ asset('storage/' . $slide->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                  <button type="submit" class="btn btn-primary">Update Slide</button>
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
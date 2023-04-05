@extends('layout.dashboard')

@section('content')
<div class="col-xl-9 col-lg-7">

    <div class="card mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Add New Customer</h5>
        </div>
        <div class="container">
            <form action="/dashboard/customers" method="post" enctype="multipart/form-data" class="m-3">
                  @csrf
                  <div class="mb-3">
                      <label for="imgName" class="form-label">Image Name</label>
                      <input type="text" class="form-control @error('imgName') is-invalid @enderror" id="imgName" 
                      name="imgName" required autofocus value="{{ old('imgName') }}">
                      @error('imgName')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Customer Image</label>
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                      name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Create Customer</button>
                </form> 
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
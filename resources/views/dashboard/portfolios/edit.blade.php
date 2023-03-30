@extends('layout.dashboard')

@section('content')
<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-9 col-lg-7">

        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Edit Portfolio</h5>
            </div>
            <div class="container">
              <form action="/dashboard/portfolios/{{ $portfolio->id }}" method="post" enctype="multipart/form-data" class="m-3">
                @method('put')
                  @csrf
                  <div class="mb-3">
                      <label for="projectName" class="form-label">Project Name</label>
                      <input type="text" class="form-control @error('projectName') is-invalid @enderror" id="projectName" 
                      name="projectName" required autofocus value="{{ old('projectName', $portfolio->projectName) }}">
                      @error('projectName')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="service" class="form-label">Type</label>
                      <select class="form-select" name="service_id">
                        @foreach ($services as $service)
                          @if(old('service_id', $portfolio->service_id) == $service->id)
                            <option value="{{ $service->id }}" selected>{{ $service->type }}</option>
                          @else
                             <option value="{{ $service->id }}">{{ $service->type }}</option>
                          @endif
                        @endforeach
                      </select>
                    </div> 
                    <div class="mb-3">
                      <label for="image" class="form-label">Portfolio Image</label>
                      <input type="hidden" name="oldImage" value="{{ $portfolio->image }}">
                        @if ($portfolio->image)
                          <img src="{{ asset('storage/' . $portfolio->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                  <button type="submit" class="btn btn-primary">Update portfolio</button>
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
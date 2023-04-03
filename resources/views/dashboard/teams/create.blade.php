@extends('layout.dashboard')

@section('content')
<div class="col-xl-9 col-lg-7">

    <div class="card mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Create Team</h5>
        </div>
        <div class="container">
            <form action="/dashboard/teams" method="post" enctype="multipart/form-data" class="m-3">
                  @csrf
                  <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
                      name="name" required autofocus value="{{ old('name') }}">
                      @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  <div class="mb-3">
                      <label for="profession" class="form-label">Profession</label>
                      <input type="text" class="form-control @error('profession') is-invalid @enderror" id="profession" 
                      name="profession" required autofocus value="{{ old('profession') }}">
                      @error('profession')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  <div class="mb-3">
                      <label for="linkFB" class="form-label">Link Facebook</label>
                      <input type="text" class="form-control @error('linkFB') is-invalid @enderror" id="linkFB" 
                      name="linkFB" required autofocus value="{{ old('linkFB') }}">
                      @error('linkFB')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  <div class="mb-3">
                      <label for="linkGoogle" class="form-label">Link Google</label>
                      <input type="text" class="form-control @error('linkGoogle') is-invalid @enderror" id="linkGoogle" 
                      name="linkGoogle" required autofocus value="{{ old('linkGoogle') }}">
                      @error('linkGoogle')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  <div class="mb-3">
                      <label for="linkTwitter" class="form-label">Link Twitter</label>
                      <input type="text" class="form-control @error('linkTwitter') is-invalid @enderror" id="linkTwitter" 
                      name="linkTwitter" required autofocus value="{{ old('linkTwitter') }}">
                      @error('linkTwitter')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                  <div class="mb-3">
                      <label for="linkLinkedln" class="form-label">Link Linkedln</label>
                      <input type="text" class="form-control @error('linkLinkedln') is-invalid @enderror" id="linkLinkedln" 
                      name="linkLinkedln" required autofocus value="{{ old('linkLinkedln') }}">
                      @error('linkLinkedln')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="image" class="form-label">Team Image</label>
                      <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                      name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Create Team</button>
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
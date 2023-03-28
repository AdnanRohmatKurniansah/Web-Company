@extends('layout.dashboard')

@section('content')
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-9 col-lg-7">

            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Slides</h5>
                </div>
                <div class="card-body">
                    <a href="/dashboard/slides/create" data-toggle="modal" data-target="#createModal" class="btn btn-primary my-2">Create new slide</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image Name</th>
                            <th scope="col">Action  </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                            <td class="d-flex">
                                <a class="badge bg-info mr-1" href="" style="font-size: 18px"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="" method="">
                                    <button class="badge bg-danger border-0" style="font-size: 19px" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal-->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Slide</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="image-name" class="form-label">Image Name</label>
                            <input type="text" class="form-control @error('image-name') is-invalid @enderror" id="image-name" 
                            name="image-name" required autofocus value="{{ old('image-name') }}">
                            @error('image-name')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                          </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" 
                            name="slug" required autofocus value="{{ old('slug') }}">
                            @error('slug')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                          </div>
                          <div class="mb-3">
                            <label for="image" class="form-label">Slide Image</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" 
                            name="image" onchange="previewImage()">
                          @error('image')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="btn btn-primary" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const imageName = document.querySelector('#image-name')
        const slug = document.querySelector('#slug')
        
        imageName.addEventListener('change', function() {
            fetch('/dashboard/slides/checkSlug?image-name=' + imageName.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
        });
        
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
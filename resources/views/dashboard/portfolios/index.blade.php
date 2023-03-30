@extends('layout.dashboard')

@section('content')
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-9 col-lg-7">

            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Portfolios</h5>
                </div>
                <div class="card-body">
                    <a href="/dashboard/portfolios/create" class="btn btn-primary my-2">Create new portfolios</a>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Project Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($portfolios as $portfolio)
                            
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $portfolio->projectName }}</td>
                            <td>{{ $portfolio->service->type }}</td>
                            <td class="d-flex">
                                <a href="/dashboard/portfolios/{{ $portfolio->id }}/edit" class="badge bg-info mr-1" style="font-size: 18px"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="/dashboard/portfolios/{{ $portfolio->id }}" method="post">
                                  @method('delete')
                                  @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" style="font-size: 19px" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>

                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>

@endsection
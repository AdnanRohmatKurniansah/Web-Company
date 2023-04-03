@extends('layout.dashboard')

@section('content')
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-9 col-lg-7">

            <div class="card mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Detail Message</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><b>From :</b> <p>{{ $contact->name }}</p></li>
                        <li><b>Message :</b> <p>{{ $contact->message }}</p></li>
                        <li><b>Email :</b> <p>{{ $contact->email }}</p></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <a href="/dashboard/contacts" class="btn btn-primary my-2">Back</a>
                </div>
            </div>
        </div>
    </div>

@endsection
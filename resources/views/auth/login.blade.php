@extends('layout.kosong')

@section('content')

@if (session()->has('LoginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('LoginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="login-card">
  <h1>Log-in</h1><br>
<form action="/auth/login" method="post">
  @csrf
  <input id="email" class="@error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
  @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
  <input id="password" class="@error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
  <button type="submit" name="login" class="login login-submit">Login</button>
</form>
  
</div>


@endsection
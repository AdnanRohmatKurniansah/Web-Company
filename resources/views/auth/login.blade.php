@extends('layout.kosong')

@section('content')

<div class="login-card">
  <h1>Log-in</h1><br>
<form action="/auth/login" method="post">
  @csrf
  <input id="username" class="@error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required style="height: 44px;
  font-size: 16px; width: 100%; margin-bottom: 10px; -webkit-appearance: none; background: #fff; border: 1px solid #d9d9d9; border-top: 1px solid #c0c0c0; padding: 0 8px; box-sizing: border-box; -moz-box-sizing: border-box;">
  @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
  @enderror
  <input id="password" class="@error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
  <button type="submit" name="login" class="login login-submit">Login</button>
</form>
  
</div>


@endsection
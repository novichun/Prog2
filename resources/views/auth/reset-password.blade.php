@extends('templates.main')

@section('content')
<h1>Jelszó visszaállítás</h1>
<form method="POST" action="{{ url('reset-password') }}">
    @csrf
  <input type="hidden"  name="token"  value="{{ $request->token }}">
  <div class="mb-3">
    <label for="email" class="form-label">Email címe</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ $request->email }}">
    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Jelszó</label>
    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
    @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="password_confirmation" class="form-label">Jelszó mégegyszer</label>
    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
  </div>
 
  <button type="submit" class="btn btn-primary">Megerősítés</button>
</form>
@endsection
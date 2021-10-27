@extends('templates.main')

@section('content')

<h1>{{ auth()->user()->name }} Profilja</h1>

<div class="container">
  <div class="row">
    <div class="col-md10">
      <img src="/uploads/avatars/{{ auth()->user()->avatar }}" style=" width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
  </div>
</div>

<form enctype="multipart/form-data" action="profile_avatar" method="POST">
  <label>Profilkép frissítése</label>
  <div class="row">
  <input type="file" name="avatar">
  
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
  <input type="submit" value="Frissítés" class="pull-right btn btn-sm btn-primary">
</form>

</div>
</div>
<br>

<form method="POST" action="{{ route('user-profile-information.update') }}">
    @csrf
    @method("PUT")
  <div class="mb-3">
    <label for="name" class="form-label">Teljes Neve</label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value="{{ auth()->user()->name }}">
    @error('name')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email címe</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{ auth()->user()->email }}">
    @error('email')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telefonszáma</label>
    <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" aria-describedby="phone" value="{{ auth()->user()->phone }}">
    @error('phone')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
  </div>
  
 
  <button type="submit" class="btn btn-primary">Frissítés</button>
</form>

@endsection
@csrf
<div class="mb-3">
  <label for="name" class="form-label">Teljes Neve</label>
  <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" 
  value="{{ old('name') }} @isset($user) {{ $user->name }} @endisset">
  @error('name')
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email címe</label>
  <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" 
  value="{{ old('email') }} @isset($user) {{ $user->email }} @endisset">
  @error('email')
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>

@isset($create)

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
  <label for="password_confirmation" class="form-label">Jelszó Mégegyszer</label>
  <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password">
  @error('password_confirmation')
      <span class="invalid-feedback" role="alert">
          {{ $message }}
      </span>
  @enderror
</div>

@endisset

<div class="mb-3">
  @foreach ($jogoks as $role)
  
  <div class="form-check">
    <input class="form-check-input" name="jogoks[]"
            type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}"
@isset($user) @if(in_array($role->id, $user->jogoks->pluck('id')->toArray())) checked @endif @endisset>
            <label class="form-check-label" for="{{ $role->name }}">
            {{ $role->name }}
            </label>
  </div>
  @endforeach
      
  
</div>

<button type="submit" class="btn btn-primary">
    @isset($create)
    Létrehozás
    @endisset
    @isset($edit)
    Szerkesztés
    @endisset
</button>
@if(session('succes'))
<div class="alert alert-success" role="alert">
    {{session('succes')}}
  </div>
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">
    {{session('error')}}
  </div>
@endif
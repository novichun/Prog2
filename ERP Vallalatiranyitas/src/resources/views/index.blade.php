@extends('templates.main')

@section('content')

    
    @auth
    <h1 class="center-text">Köszöntjük a kezdőlapon {{ auth()->user()->name }}!</h1>
        @else
        <div class="center">
        <h1>Vállalatirányíátsi Rendszer</h1>
        <p>Made by Novák Dániel</p>
               </div>
    @endauth

@endsection
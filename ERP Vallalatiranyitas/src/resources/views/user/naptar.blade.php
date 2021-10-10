@extends('templates.main')

@section('content')
<h1 class="center-text">Az ön naptára naptára {{ auth()->user()->name }}</h1>

@endsection
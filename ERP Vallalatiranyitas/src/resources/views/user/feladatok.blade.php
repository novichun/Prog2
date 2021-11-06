@extends('templates.main')

@section('content')
<h1 class="center-text">Az ön feladatai {{ auth()->user()->name }}</h1>

@foreach (auth()->user()->tasks as $task)
    <div class="card" style="margin-bottom:30px;">
    <div class="task"><b>Feladat:</b> {{ $task->feladat }}</div>
    <div class="projekt"><b>Projekt:</b> {{ $task->projekt }}</div>
    <div class="hatarido"><b>Határidő:</b> {{ $task->hatarido }}</div>
<div class="letrehozas"><b>Feladat létrehozásának ideje:</b> {{ $task->created_at }}</div>
    </div>
@endforeach

@endsection
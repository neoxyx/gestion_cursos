@extends('layout/template')

@section('title', 'Registrar Curso | Gestión Cursos')

@section('contenido')

<main>
    <div class="container py-4">
        <h1>{{ $msg }}</h1>
        <a href="{{ url('cursos') }}" class="btn btn-secondary">Regresar</a>
    </div>
</main>    
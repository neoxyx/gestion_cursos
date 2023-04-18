@extends('layout/template')

@section('title', 'Registrar Estudiante | Gestión Cursos')

@section('contenido')
<main>
    <div class="container py-4">
        <h1>Editar Estudiante</h1>
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ url('estudiantes/'.$estudiante->id) }}" method="post">
            @method("PUT")
            @csrf
            <div class="mb-3 row">
                <label for="curso" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $estudiante->nombre }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="apellido" class="col-sm-2 col-form-label">Apellido:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ $estudiante->apellido }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="edad" class="col-sm-2 col-form-label">Edad:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="edad" id="edad" value="{{ $estudiante->edad }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" name="email" id="email" value="{{ $estudiante->email }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="cursos" class="col-sm-2 col-form-label">Cursos asociados:</label>
                <div class="col-sm-5">
                    <select multiple name="cursos[]" id="cursos" class="form-select" required>                        
                        @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <a href="{{ url('estudiantes') }}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
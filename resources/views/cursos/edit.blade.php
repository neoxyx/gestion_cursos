@extends('layout/template')

@section('title', 'Registrar Curso | Gestión Cursos')

@section('contenido')
<main>
    <div class="container py-4">
        <h1>Editar Curso</h1>
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
        <form action="{{ url('cursos/'.$curso->id) }}" method="post">
            @method("PUT")
            @csrf
            <div class="mb-3 row">
                <label for="curso" class="col-sm-2 col-form-label">Nombre:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $curso->nombre }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="horario" class="col-sm-2 col-form-label">Horario:</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="horario" id="horario" value="{{ $curso->horario }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="fecha_ini" class="col-sm-2 col-form-label">Fecha Inicio:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" value="{{ $curso->fecha_inicio }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="fecha_fin" class="col-sm-2 col-form-label">Fecha Fin:</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="{{ $curso->fecha_fin }}" required>
                </div>
            </div>
            <a href="{{ url('cursos') }}" class="btn btn-secondary">Regresar</a>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
    </div>
</main>
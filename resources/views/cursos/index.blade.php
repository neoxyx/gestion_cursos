@extends('layout/template')

@section('title', 'Cursos | Gestión Cursos')

@section('contenido')

<main>
    <div class="container py-4">
        <h1>Cursos</h1>
        <a href="{{url('cursos/create')}}" class="btn btn-primary btn-sm">Nuevo registro</a>
        <a href="{{url('/')}}" class="btn btn-secondary btn-sm">Volver</a>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Horario</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $curso->horario }}</td>
                    <td>{{ $curso->fecha_inicio }}</td>
                    <td>{{ $curso->fecha_fin }}</td>
                    <td><a href="{{ url('cursos/'.$curso->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a></td>
                    <td><form action="{{ url('cursos/'.$curso->id) }}" method="post">
                        @method("DELETE")
                        @csrf<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
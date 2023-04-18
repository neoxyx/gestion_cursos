@extends('layout/template')

@section('title', 'Estudiantes | Gestión Cursos')

@section('contenido')

<main>
    <div class="container py-4">
        <h1>Estudiantes</h1>
        <a href="{{url('estudiantes/create')}}" class="btn btn-primary btn-sm">Nuevo registro</a>
        <a href="{{url('/')}}" class="btn btn-secondary btn-sm">Volver</a>        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Email</th>
                    <th>Cursos</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->id }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->edad }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>{{ $cursos = DB::table('cursos__estudiantes')
                ->select('cursos.nombre as nombre_curso')
                ->join('cursos', 'cursos__estudiantes.curso_id', '=', 'cursos.id')
                ->where('estudiante_id', '=', $estudiante->id)
                ->get() }}
                    </td>
                    <td><a href="{{ url('estudiantes/'.$estudiante->id.'/edit') }}" class="btn btn-warning btn-sm">Editar</a></td>
                    <td><form action="{{ url('estudiantes/'.$estudiante->id) }}" method="post">
                        @method("DELETE")
                        @csrf<button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Top 3 Cursos con más estudiantes en los últimos 6 meses</h4>                
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Inscripciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dataTop as $top)
                <tr>
                    <td>{{ $top->nombre }}</td>
                    <td>{{ $top->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
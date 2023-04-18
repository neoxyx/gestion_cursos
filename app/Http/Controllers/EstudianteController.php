<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Cursos_Estudiante;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataTop = Cursos_Estudiante::select('cursos.nombre', DB::raw('count(cursos__estudiantes.curso_id) as total'))
            ->join('cursos', 'cursos__estudiantes.curso_id', '=', 'cursos.id')
            ->where('cursos__estudiantes.updated_at', '>', DB::raw('date_sub(now(), interval 180 day)'))
            ->groupBy('cursos.nombre')
            ->orderBy('total', 'DESC')
            ->limit('3')->get();
        return view('estudiantes.index', ['estudiantes' => Estudiante::all(), 'dataTop' => $dataTop]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create', ['cursos' => Curso::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'edad' => 'required|max:3',
            'email' => 'required|email|max:255',
            'cursos' => 'required'
        ]);

        $estudiante = new Estudiante();
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido = $request->input('apellido');
        $estudiante->edad = $request->input('edad');
        $estudiante->email = $request->input('email');
        $estudiante->save();

        $cursos = $request->input('cursos');
        for ($i = 0; $i < count($cursos); $i++) {
            $curso_estudiante = new Cursos_Estudiante();
            $curso_estudiante->estudiante_id = $estudiante->id;
            $curso_estudiante->curso_id = $cursos[$i];
            $curso_estudiante->save();
        }

        return view("estudiantes.message", ['msg' => "Registro guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante = Estudiante::find($id);
        $cursos_estudiantes = Cursos_Estudiante::find($estudiante->id);

        return view('estudiantes.edit', ['estudiante' => $estudiante, 'cursos' => Curso::all(), 'cursos_estudiantes' => $cursos_estudiantes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'edad' => 'required|max:3',
            'email' => 'required|email|max:255',
            'cursos' => 'required'
        ]);

        $curso_estudiante = Cursos_Estudiante::where('estudiante_id', $id);
        $curso_estudiante->delete();

        $estudiante = Estudiante::find($id);
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido = $request->input('apellido');
        $estudiante->edad = $request->input('edad');
        $estudiante->email = $request->input('email');
        $estudiante->save();

        $cursos = $request->input('cursos');
        for ($i = 0; $i < count($cursos); $i++) {
            $curso_estudiante = new Cursos_Estudiante();
            $curso_estudiante->estudiante_id = $id;
            $curso_estudiante->curso_id = $cursos[$i];
            $curso_estudiante->save();
        }

        return view("estudiantes.message", ['msg' => "Registro actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();

        return redirect("estudiantes");
    }
}
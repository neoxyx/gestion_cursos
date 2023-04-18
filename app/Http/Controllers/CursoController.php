<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cursos.index', ['cursos' => Curso::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'horario' => 'required|max:255',
            'fecha_ini' => 'required',
            'fecha_fin' => 'required'
        ]);

        $curso = new Curso();
        $curso->nombre = $request->input('nombre');
        $curso->horario = $request->input('horario');
        $curso->fecha_inicio = $request->input('fecha_ini');
        $curso->fecha_fin = $request->input('fecha_fin');
        $curso->save();
        return view("cursos.message", ['msg' => "Registro guardado"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {        
        $curso = Curso::find($id);
        return view('cursos.edit', ['curso' => $curso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'horario' => 'required|max:255',
            'fecha_ini' => 'required',
            'fecha_fin' => 'required'
        ]);

        $curso = Curso::find($id);
        $curso->nombre = $request->input('nombre');
        $curso->horario = $request->input('horario');
        $curso->fecha_inicio = $request->input('fecha_ini');
        $curso->fecha_fin = $request->input('fecha_fin');
        $curso->save();

        return view("cursos.message", ['msg' => "Registro actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        return redirect("cursos");
    }
}
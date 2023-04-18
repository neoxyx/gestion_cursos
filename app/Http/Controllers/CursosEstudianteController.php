<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Cursos_Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursosEstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($estudiante_id)
    {
        $curso = DB::table('cursos__estudiantes')
            ->select('curso_id')
            ->where('estudiante_id', '=', $estudiante_id)
            ->get();
        return $curso;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos_Estudiante $cursos_Estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursos_Estudiante $cursos_Estudiante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cursos_Estudiante $cursos_Estudiante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cursos_Estudiante $cursos_Estudiante)
    {
        //
    }
}
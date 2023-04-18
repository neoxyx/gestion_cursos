<?php

namespace Database\Seeders;

use Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cursos = ['Laravel','Nodejs','Python'];

        foreach($cursos as $curso){
            DB::table('cursos')->insert([
                'nombre' => $curso,
                'horario' => 'Diurno',
                'fecha_inicio' => '2023-06-24',
                'fecha_fin' => '2024-06-24'
            ]);
        }
    }
}

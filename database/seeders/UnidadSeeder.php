<?php

namespace Database\Seeders;

use App\Models\Unidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidades = [
            ['descripcion' => 'Unidad', 'estado' => true],
            ['descripcion' => 'Par', 'estado' => true],
            ['descripcion' => 'Docena', 'estado' => true],
            ['descripcion' => 'Pack', 'estado' => true],
            ['descripcion' => 'Caja', 'estado' => true],
            ['descripcion' => 'Bolsa', 'estado' => true],
            ['descripcion' => 'Lote', 'estado' => true],
            ['descripcion' => 'Litro', 'estado' => true],
            ['descripcion' => 'Metro', 'estado' => true],
            ['descripcion' => 'Kilogramo', 'estado' => true],
            ['descripcion' => 'Galón', 'estado' => true],
        ];

        foreach ($unidades as $unidad) {
            Unidad::create($unidad);
        }
    }
}

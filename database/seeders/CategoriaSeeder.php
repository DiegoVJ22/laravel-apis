<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['descripcion' => 'Tecnología', 'estado' => true],
            ['descripcion' => 'Electrodomésticos', 'estado' => true],
            ['descripcion' => 'Ropa', 'estado' => true],
            ['descripcion' => 'Útiles escolares', 'estado' => true],
            ['descripcion' => 'Automóviles', 'estado' => true],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}

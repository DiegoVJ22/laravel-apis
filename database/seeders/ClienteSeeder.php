<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nro_doc' => '12345678901',
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'email' => 'juan.perez@example.com',
                'direccion' => 'Av. Principal 123',
                'estado' => true              
            ],
            [
                'nro_doc' => '23456789012',
                'nombre' => 'Maria',
                'apellido' => 'Garcia',
                'email' => 'maria.garcia@example.com',
                'direccion' => 'Calle Secundaria 456',
                'estado' => true
            ],
            [
                'nro_doc' => '34567890123',
                'nombre' => 'Carlos',
                'apellido' => 'Lopez',
                'email' => 'carlos.lopez@example.com',
                'direccion' => 'Jr. Los Olivos 789',
                'estado' => true
            ],
            [
                'nro_doc' => '45678901234',
                'nombre' => 'Ana',
                'apellido' => 'Martinez',
                'email' => 'ana.martinez@example.com',
                'direccion' => 'Av. Las Flores 321',
                'estado' => true
            ],
            [
                'nro_doc' => '56789012345',
                'nombre' => 'Luis',
                'apellido' => 'Ramirez',
                'email' => 'luis.ramirez@example.com',
                'direccion' => 'Calle Los Pinos 654',
                'estado' => true
            ],
            [
                'nro_doc' => '67890123456',
                'nombre' => 'Sofia',
                'apellido' => 'Fernandez',
                'email' => 'sofia.fernandez@example.com',
                'direccion' => 'Av. Central 987',
                'estado' => true
            ],
            [
                'nro_doc' => '78901234567',
                'nombre' => 'Miguel',
                'apellido' => 'Torres',
                'email' => 'miguel.torres@example.com',
                'direccion' => 'Jr. Primavera 159',
                'estado' => true
            ],
            [
                'nro_doc' => '89012345678',
                'nombre' => 'Clara',
                'apellido' => 'Vargas',
                'email' => 'clara.vargas@example.com',
                'direccion' => 'Calle Sol 753',
                'estado' => true
            ],
            [
                'nro_doc' => '90123456789',
                'nombre' => 'Javier',
                'apellido' => 'Ortega',
                'email' => 'javier.ortega@example.com',
                'direccion' => 'Av. Norte 852',
                'estado' => true
            ],
            [
                'nro_doc' => '01234567890',
                'nombre' => 'Laura',
                'apellido' => 'Castillo',
                'email' => 'laura.castillo@example.com',
                'direccion' => 'Calle Sur 369',
                'estado' => true
            ],
            [
                'nro_doc' => '11223344556',
                'nombre' => 'Diego',
                'apellido' => 'Morales',
                'email' => 'diego.morales@example.com',
                'direccion' => 'Jr. Los Eucaliptos 258',
                'estado' => true
            ],
            [
                'nro_doc' => '22334455667',
                'nombre' => 'Elena',
                'apellido' => 'Cruz',
                'email' => 'elena.cruz@example.com',
                'direccion' => 'Av. Universitaria 741',
                'estado' => true
            ],
            [
                'nro_doc' => '33445566778',
                'nombre' => 'Pablo',
                'apellido' => 'Gomez',
                'email' => 'pablo.gomez@example.com',
                'direccion' => 'Calle Arboleda 123',
                'estado' => true
            ],
            [
                'nro_doc' => '44556677889',
                'nombre' => 'Marta',
                'apellido' => 'Rojas',
                'email' => 'marta.rojas@example.com',
                'direccion' => 'Jr. Las Violetas 456',
                'estado' => true
            ],
            [
                'nro_doc' => '55667788990',
                'nombre' => 'Fernando',
                'apellido' => 'Sanchez',
                'email' => 'fernando.sanchez@example.com',
                'direccion' => 'Av. Los Robles 789',
                'estado' => true
            ],
        ]);
    }
}

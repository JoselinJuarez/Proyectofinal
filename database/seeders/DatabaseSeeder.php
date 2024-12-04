<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Garantia;
use App\Models\Pago;
use App\Models\Prestamo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Ivan Rosales',
            'email' => 'ivan@gmail.com',
            'password' => Hash::make('asdf1234'),
            'role' => 'Administrador',
            'foto' => '/storage/images/users/Perfil_1.png'
        ]);

        User::factory()->create([
            'name' => 'Pepe Aguilar',
            'email' => 'pepe@gmail.com',
            'password' => Hash::make('asdf1234'),
            'role' => 'Cobrador',
            'foto' => '/storage/images/users/Perfil_2.png'
        ]);

        Cliente::create([
            'id' => 1,
            'nombre' => 'Kevin',
            'correo' => 'kevin@gmail.com',
            'telefono' => '60607070',
            'direccion' => 'Calle Calama',
        ]);

        Cliente::create([
            'id' => 2,
            'nombre' => 'Daniel',
            'correo' => 'dani@gmail.com',
            'telefono' => '33221122',
            'direccion' => 'Calle Coahuila',
        ]);

        Prestamo::create([
            'id' => 4,
            'cliente_id' => 1,
            'id_usuario' => 2,
            'monto' => 120.00,
            'interes' => 0.10,
            'estado' => 'Pagado',
            'fecha_inicio' => '2024-12-01',
            'fecha_fin' => '2024-12-08',
            'total' => 132.00,
        ]);

        Prestamo::create([
            'id' => 5,
            'cliente_id' => 2,
            'id_usuario' => 2,
            'monto' => 1000.00,
            'interes' => 0.20,
            'estado' => 'Activo',
            'fecha_inicio' => '2024-12-02',
            'fecha_fin' => '2024-12-08',
            'total' => 1200.00,
        ]);

        Garantia::create([
            'id' => 3,
            'prestamo_id' => 4,
            'valor' => 200.00,
            'descripcion' => 'Objeto de garantia valioso',
            'estado' => 'En garantía',
        ]);

        Pago::create([
            'id' => 7,
            'prestamo_id' => 4,
            'fecha_pago' => '2024-12-02',
            'monto' => 100.00
        ]);

        Pago::create([
            'id' => 8,
            'prestamo_id' => 4,
            'fecha_pago' => '2024-12-02',
            'monto' => 100.00
        ]);
    }
}

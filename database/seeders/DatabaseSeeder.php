<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Escadashop',
            'username' => 'escadashop',
            'password' => 'Matheus@123',
            'vendedor' => true,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Matheus Rodrigues',
            'username' => 'piracemma',
            'password' => 'Matheus@123',
            'vendedor' => false,
        ]);
        \App\Models\Finalizadora::factory()->create([
            'nome' => 'Debito'
        ]);
        \App\Models\Finalizadora::factory()->create([
            'nome' => 'Dinheiro'
        ]);
        \App\Models\Finalizadora::factory()->create([
            'nome' => 'Credito'
        ]);
    }
}

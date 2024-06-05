<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Reparation;
use App\Models\SparePart;
use App\Models\Vehicule;
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
            'username' => 'Test michanic',
            'role' => 'Michanic',
            'email' => 'test1@example.com',
        ]);
        \App\Models\User::factory()->create([
            'username' => 'Test Admin',
            'role' => 'Admin',
            'email' => 'test@example.com',
        ]);
        Client::factory()->count(20)->create();
        Vehicule::factory()->count(20)->create();
        Reparation::factory()->count(10)->create();
        SparePart::factory()->count(20)->create();
    }


}

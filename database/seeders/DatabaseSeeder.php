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
        \App\Models\Project::factory(10)->create();

        // Aggiungiamo il TypeSeeder
        $this->call(TypeSeeder::class);

        \App\Models\User::factory()->create([
            'name' => 'Leonardo',
            'email' => 'leonardo@esempio.it',
        ]);
    }
}

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
        \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);
         $this->call(ProfesseurSeeder::class);
         $this->call(SemestreSeeder::class);
         $this->call(GroupeSeeder::class);
         $this->call(EtudiantSeeder::class);
         $this->call(LocalSeeder::class);
         $this->call(ModuleSeeder::class);
         $this->call(MatiereSeeder::class);

    }
}

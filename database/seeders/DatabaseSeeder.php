<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
        \App\Models\User::factory(2)->create(['role' => 'admin']);
        \App\Models\User::factory(2)->create(['role' => 'super_admin']);

         \App\Models\User::factory()->create([
             'name' => 'Gigus Admin',
             'email' => 'gigus@example.com',
         ]);

         $this->call([
             CompanySeeder::class,
             RoleSeeder::class,
             GigSeeder::class,
             TagSeeder::class,
             CountrySeeder::class,
         ]);
    }
}

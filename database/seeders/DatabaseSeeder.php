<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        User::factory(2)->create();
        User::factory(2)->create(['role' => 'admin']);
        User::factory(2)->create(['role' => 'super_admin']);

         User::factory()->create([
             'name' => 'Gigus Admin',
             'email' => 'gigus@example.com',
             'role' => 'admin'
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

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Product Designer', 'Backend Developer', 'Frontend Developer', 'Mobile Developer', 'Quality Assurance'];

        collect($roles)->each(function ($value) {
            Role::query()->create([
                'name' => $value,
                'slug' => Str::slug($value)
            ]);
        });
    }
}

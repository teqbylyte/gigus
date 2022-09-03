<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Gig;
use Illuminate\Database\Seeder;

class GigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::query()->select('id')->get();

        $companies->each(function (Company $company) {
            Gig::factory()->create(['company_id' => $company->id]);
        });
    }
}

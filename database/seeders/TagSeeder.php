<?php

namespace Database\Seeders;

use App\Models\Gig;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['freelance', 'full-time', 'remote', 'contract', 'part-time'];

        collect($tags)->each(function (string $value) {
            $tag = new Tag(['name' => $value]);
            $tag->save();

//            make relationship between tag and gigs
            $tag->gigs()->attach(Gig::query()->inRandomOrder()->limit(4)->pluck('id')->toArray());
        });
    }
}

<?php

namespace App\Helpers;

use App\Models\Gig;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagHelper
{
    /**
     * Attach the defined gig to the tags
     *
     * Normally, tags input would be a multiselect to allow multiple tags, for now we all with separation by comma in a text input
     *
     * @param array<string,string>|string $tags Tags can either be an array of strings or strings separated by comma depending on the frontend implementation.
     * @param Gig $gig
     */
    public static function attachGig(array|string $tags, Gig $gig)
    {
        $tags = is_string($tags) ? explode(',', $tags) : $tags;

        $tag_ids = [];

        collect($tags)->each(function ($tag) use (&$tag_ids) {
            $tag = Str::slug($tag);
            $t = Tag::query()->where('name', $tag)->select('id')->first();

//            Create tag if it doesn't exist
            $t = $t ?? Tag::query()->create(['name' => $tag]);

            $tag_ids[] = $t->id;
        });

        $gig->tags()->attach($tag_ids);
    }
}

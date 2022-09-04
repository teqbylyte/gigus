<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class General
{
    public static function generateSlug(string $value, Model $model, string $column): string
    {

        $value = Str::slug($value);

        if ($model->newQuery()->where($column, $value)->exists()) {
            return self::generateSlug($value, $model, $column);
        }

        return $value;
    }
}

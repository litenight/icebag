<?php

namespace App\Concerns;

use Illuminate\Support\Str;

trait GeneratesUid
{
    /**
     * Boot trait.
     */
    protected static function bootGeneratesUid()
    {
        static::creating(function ($model) {
            $model->uid = uniqid();
        });
    }
}

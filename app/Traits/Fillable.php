<?php

namespace App\Traits;

trait Fillable
{
    /**
     * Get fillable attributes.
     *
     * @return array
     */
    public static function attributes()
    {
        return (new self)->fillable;
    }
}

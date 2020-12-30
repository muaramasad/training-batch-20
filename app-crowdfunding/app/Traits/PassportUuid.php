<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait PassportUuid {
    public static function bootPassportUuid () {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
    public function getIncrementing()
    {
        return false;
    }
    public function getKeyType()
    {
        return 'string';
    }
}

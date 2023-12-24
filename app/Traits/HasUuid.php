<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * The uuid key for the model.
     */
    protected string $uuidKey = 'uuid';

    /**
     * Get the uuid key for the model.
     */
    public function getUuidKeyName(): string
    {
        return $this->uuidKey;
    }

    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getUuidKeyName()})) {
                $model->{$model->getUuidKeyName()} = Str::uuid()->toString();
            }
        });
    }
}

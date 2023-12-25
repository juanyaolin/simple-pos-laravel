<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TemporaryUpload extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'owner_type',
        'owner_id',
    ];

    /**
     * Guest模式使用的上傳檔案暫存對象
     */
    public static function asGuest(): static
    {
        $model = static::query()
            ->whereNull('owner_type')
            ->whereNull('owner_id')
            ->first();

        if (is_null($model)) {
            $model = static::create([]);
        }

        return $model;
    }
}

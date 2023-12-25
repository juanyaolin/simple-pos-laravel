<?php

namespace App\Traits;

use App\Models\TemporaryUpload;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasTemporaryUpload
{
    /**
     * 上傳檔案的暫存對象
     */
    public function temporaryUpload(): MorphOne
    {
        return $this->morphOne(TemporaryUpload::class, 'owner');
    }
}

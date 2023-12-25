<?php

namespace App\Services\Upload;

use App\Enums\MediaCollectionEnum;
use App\Enums\MediaCustomPropertyEnum;
use App\Enums\UploadTypeEnum;
use App\Models\TemporaryUpload;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadService
{
    public function validateByUploadType(
        UploadTypeEnum $uploadType,
        UploadedFile $file
    ): void {
        Validator::validate(compact('file'), $uploadType->rules());
    }

    public function upload(UploadedFile $file, User $user = null): Media
    {
        /** @var \Spatie\MediaLibrary\HasMedia $model */
        $model = is_null($user)
            ? TemporaryUpload::asGuest()
            : $user->temporaryUpload()->firstOrCreate();

        $fileName = Str::random(20);
        $extension = $file->getClientOriginalExtension();
        $customProperties = [
            MediaCustomPropertyEnum::ORIGINAL_FILE_NAME->value => $file->getClientOriginalName(),
        ];

        return $model->addMedia($file)
            ->usingFileName("{$fileName}.{$extension}")
            ->usingName($fileName)
            ->withCustomProperties($customProperties)
            ->toMediaCollection(MediaCollectionEnum::TEMPNORARY->value);
    }
}

<?php

namespace App\Http\Controllers\Api\Admin;

use App\Enums\UploadTypeEnum;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Upload\UploadRequest;
use App\Http\Resources\Media\MediaResource;
use App\Services\Upload\UploadService;

class UploadController extends Controller
{
    public function upload(UploadRequest $request, UploadService $service)
    {
        $service->validateByUploadType(
            UploadTypeEnum::tryFrom($request->validated('uploadType')),
            $request->file('file')
        );

        $media = $service->upload($request->file('file'), $request->user());

        return $this->success(MediaResource::make($media));
    }
}

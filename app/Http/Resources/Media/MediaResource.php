<?php

namespace App\Http\Resources\Media;

use App\Enums\MediaCustomPropertyEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->uuid,
            'fileName' => $this->resource->getCustomProperty(
                MediaCustomPropertyEnum::ORIGINAL_FILE_NAME->value
            ),
            'url' => $this->resource->getUrl(),
        ];
    }
}

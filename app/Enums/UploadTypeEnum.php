<?php

namespace App\Enums;

enum UploadTypeEnum: string
{
    /**
     * Validation rules.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return ['file' => match ($this) {
        }];
    }
}

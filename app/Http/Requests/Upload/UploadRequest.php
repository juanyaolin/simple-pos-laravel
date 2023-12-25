<?php

namespace App\Http\Requests\Upload;

use App\Enums\UploadTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'uploadType' => ['required', Rule::enum(UploadTypeEnum::class)],
            'file' => ['required', 'file', 'max:10240'],
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:products,slug,'.$productId],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'platform' => ['required', 'in:android,ios,both'],
            'status' => ['required', 'in:active,inactive'],
            'features' => ['nullable', 'array'],
            'features.*' => ['nullable', 'string', 'max:255'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}

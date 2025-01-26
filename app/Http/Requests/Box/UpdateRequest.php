<?php

namespace App\Http\Requests\Box;

use App\Classes\AvailableColors;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'    => ['required', 'exists:boxes,id'],
            'color' => ['required', 'string', Rule::in(app(AvailableColors::class)->colors())],
            'url'   => ['required', 'string', 'url', 'max:255', Rule::unique('boxes', 'url')],
            'title' => ['required', 'string', 'min:3', 'max:255', Rule::unique('boxes', 'title')],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('box'),
        ]);
    }
}

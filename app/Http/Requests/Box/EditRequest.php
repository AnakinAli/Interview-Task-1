<?php

namespace App\Http\Requests\Box;

use App\Services\BoxService;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'  => ['required', 'exists:boxes,id'],
            'url' => ['nullable', 'prohibited'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        if ($validator->errors()->has('url')) {
            $this->redirect = $this->url;
        }
        parent::failedValidation($validator);
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id'  => $this->box,
            'url' => app(BoxService::class)->getUrl($this->box),
        ]);
    }
}

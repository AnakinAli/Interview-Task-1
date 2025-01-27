<?php

declare(strict_types=1);

namespace App\Http\Requests\Box;

use App\Enums\Colors;
use App\Rules\Box\PreventSameSiteRedirectRule;
use App\Services\BoxService;
use Illuminate\Contracts\Validation\Validator;
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
            'id'           => ['required', 'exists:boxes,id'],
            'color'        => ['required', 'string', Rule::in([Colors::BLUE, Colors::GREEN, Colors::RED])],
            'url'          => ['required', 'string', 'url', 'max:255', new PreventSameSiteRedirectRule()],
            'previous_url' => ['nullable', 'prohibited'],
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        if ($validator->errors()->has('previous_url')) {
            $this->redirect = route('box.index');
        }

        parent::failedValidation($validator);
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'id'           => $box = $this->route('box'),
            'previous_url' => app(BoxService::class)->getUrl($box),
        ]);
    }
}

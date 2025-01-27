<?php

namespace App\Rules\Box;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PreventSameSiteRedirectRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pattern = '/\b(box|\'' . parse_url(config('app.url'), PHP_URL_HOST) . '\'|edit|update)\b/i';

        if (preg_match($pattern, $value)) {
            $fail(__('Box url should not contain: ' . config('app.url') . ' or box or edit or update.'));
        }
    }
}

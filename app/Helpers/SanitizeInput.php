<?php

namespace App\Helpers;

use Illuminate\Contracts\Validation\Rule;

class SanitizeInput implements Rule
{
    public function passes($attribute, $value)
    {
        $sanitizedValue = strip_tags($value);

        $sanitizedValue = $this->removeJavascript($sanitizedValue);

        $sanitizedValue = $this->removeSqlInjection($sanitizedValue);

        $sanitizedValue = trim($sanitizedValue);

        return $sanitizedValue;
    }

    protected function removeJavascript($value)
    {
        $pattern = '/<script\b[^>]*>(.*?)<\/script>/is';
        $sanitizedValue = preg_replace($pattern, '', $value);

        return $sanitizedValue;
    }

    protected function removeSqlInjection($value)
    {
        $sqlKeywords = [
            'SELECT', 'INSERT', 'UPDATE', 'DELETE', 'DROP', 'UNION', 'ALTER', 'TRUNCATE', 'CREATE'
        ];

        foreach ($sqlKeywords as $keyword) {
            $value = str_ireplace($keyword, '', $value);
        }

        $value = str_replace(['--', ';'], '', $value);

        return $value;
    }

    public function message()
    {
        return 'The :attribute is not properly sanitized.';
    }
}

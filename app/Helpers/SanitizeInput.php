<?php

namespace App\Helpers;

class SanitizeInput
{
    public function passes($value)
    {
        $sanitizedValue = $value;

        $sanitizedValue = strip_tags($sanitizedValue);

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

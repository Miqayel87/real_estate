<?php

namespace App\Helpers;

class SanitizeInput
{
    /**
     * Sanitize the input value.
     *
     * @return string The sanitized value.
     */
    public function passes($value): string
    {
        $sanitizedValue = $value;

        $sanitizedValue = strip_tags($sanitizedValue);

        $sanitizedValue = $this->removeJavascript($sanitizedValue);

        $sanitizedValue = $this->removeSqlInjection($sanitizedValue);

        $sanitizedValue = trim($sanitizedValue);

        return $sanitizedValue;
    }

    /**
     * Remove JavaScript tags from the input value.
     *
     * @param string $value The value to remove JavaScript tags from.
     * @return string The value with JavaScript tags removed.
     */
    protected function removeJavascript(string $value): string
    {
        $pattern = '/<script\b[^>]*>(.*?)<\/script>/is';
        $sanitizedValue = preg_replace($pattern, '', $value);

        return $sanitizedValue;
    }

    /**
     * Remove SQL injection keywords and characters from the input value.
     *
     * @param string $value The value to remove SQL injection keywords from.
     * @return string The value with SQL injection keywords removed.
     */
    protected function removeSqlInjection(string $value): string
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

    /**
     * Get the message for validation failure.
     *
     * @return string The validation failure message.
     */
    public function message(): string
    {
        return 'The :attribute is not properly sanitized.';
    }
}

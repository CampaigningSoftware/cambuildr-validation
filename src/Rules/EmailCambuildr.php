<?php


namespace CampaigningBureau\CambuildrValidation\Rules;


use Illuminate\Contracts\Validation\Rule;

class EmailCambuildr implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $basicFilter = (filter_var($value, FILTER_VALIDATE_EMAIL) !== false) && (strpos($value, '^') === false) &&
                       (strpos($value, '#') === false) && (strpos($value, '&') === false) &&
                       (strpos($value, '!') === false);

        if (!$basicFilter) {
            return false;
        }

        // try to extract the tld from the filtered email
        $parts = explode('@', $value);
        $domainPartsByDash = explode('-', $parts[1]);

        // if the last exploded part does not contain a dot, it was the tld and therefore throws an error
        if (strpos($domainPartsByDash[\count($domainPartsByDash) - 1], '.') === false) {
            return false;
        }

        // if any domain part is just 1 character long, throw an error
        $domainPartsByDot = explode('.', $parts[1]);
        foreach ($domainPartsByDot as $domainPartByDot) {
            if (\strlen($domainPartByDot) === 1) {
                return false;
            }
        }

        return $basicFilter;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The given email is invalid';
    }
}
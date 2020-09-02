<?php


namespace CampaigningBureau\CambuildrValidation\Rules;


use Illuminate\Contracts\Validation\Rule;

class EmailCambuildr implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * validate email for our cambuildr.
     * it uses the standard filtering with filter_var and adds the constraint, that emails may not contain a ^, #, & or
     * ! sign. this is due to problems with sendinblue, who do not accept such emails. also, sib does not allow dashes
     * in the tld (last) part of the email. so we also dont accept them
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
        $domainParts = explode('-', $parts[1]);

        // if the last exploded part does not contain a dot, it was the tld and
        if (strpos($domainParts[\count($domainParts) - 1], '.') === false) {
            return false;
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
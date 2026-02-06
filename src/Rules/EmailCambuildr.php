<?php


namespace CampaigningSoftware\CambuildrValidation\Rules;


use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use function count;

class EmailCambuildr implements ValidationRule
{
    private string $message = 'The given email is invalid';

    /**
     * EmailCambuildr constructor.
     *
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        if ($message !== '') {
            $this->message = $message;
        }
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed  $value
     * @param Closure $fail
     *
     * @return void
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$this->passes($attribute, $value)) {
            $fail($this->message);
        }
    }

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
    public function passes(string $attribute, mixed $value): bool
    {
        $basicFilter = (filter_var($value, FILTER_VALIDATE_EMAIL) !== false) && (!str_contains($value, '^')) &&
                       (!str_contains($value, '#')) && (!str_contains($value, '&')) && (!str_contains($value, '!'));

        if (!$basicFilter) {
            return false;
        }

        // try to extract the tld from the filtered email
        $parts = explode('@', $value);
        $domainParts = explode('-', $parts[1]);

        // if the last exploded part does not contain a dot, it was the tld and
        if (!str_contains($domainParts[count($domainParts) - 1], '.')) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return $this->message;
    }
}
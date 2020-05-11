<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class EmptyOrder
 * @package App\Rules
 */
class EmptyOrder implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool|void
     */
    public function passes($attribute, $value)
    {
        return $value !== 0;
    }

    /**
     * @return string|void
     */
    public function message()
    {
        return 'You can not submit empty order';
    }
}
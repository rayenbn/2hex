<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class WheelSubmitMinimum
 * @package App\Rules
 */
class WheelSubmitMinimum implements Rule
{
    /**
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ! ($value < 300 && $value != 0);
    }

    /**
     * @return string
     */
    public function message()
    {
        return "Your order can not be submitted. The minimum order quantity to run a production is 300 sets of wheels. You can split these 300 sets into 3 different styles, but the total must be at least 300 sets.";
    }
}
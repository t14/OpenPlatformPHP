<?php

namespace OpenPlatform\Validation\Filters;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class for validating integer values.
 */
class IntegerValidation implements ValidationInterface
{
    /**
     * @param int    $value
     * @param string $type  the filter type.
     *
     * @throws \Exception if value for integer filter is not an integer.
     */
    public function validate($value, $type)
    {
        if (!is_int($value)) {
            throw new \Exception("The value ($value) for filter type '$type' must be numeric");
        }
    }
}

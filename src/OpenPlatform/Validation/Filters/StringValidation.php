<?php

namespace OpenPlatform\Validation\Filters;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class StringValidation.
 */
class StringValidation implements ValidationInterface
{
    /**
     * Validates string query values.
     *
     * @param string $value The query value for the filter.
     * @param string $type  The filter type.
     *
     * @return bool
     *
     * @throws \Exception if query value is not a string.
     */
    public function validate($value, $type)
    {
        if (!is_string($value)) {
            throw new \Exception("The value ($value) for filter type; '$type' must be a string");
        }

        return true;
    }
}

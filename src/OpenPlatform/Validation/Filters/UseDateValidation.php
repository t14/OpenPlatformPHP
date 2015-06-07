<?php

namespace OpenPlatform\Validation\Filters;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class UseDateValidation.
 */
class UseDateValidation implements ValidationInterface
{
    /**
     * Validates use-date filter.
     *
     * @param string $value query value for the filter
     * @param string $type  the type of filter.
     *
     * @return bool
     *
     * @throws \Exception if invalid query is used for this filter type.
     */
    public function validate($value, $type)
    {
        switch ($value) {
            case 'published':
            case 'newspaper-edition':
            case 'last-modified':
                return true;
                break;
            default: throw new \Exception("The use date value is not valid $type");
        }
    }
}

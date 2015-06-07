<?php

namespace OpenPlatform\Validation\Filters;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class OrderByValidation.
 */
class OrderByValidation implements ValidationInterface
{
    /**
     * Validates order type values.
     *
     * @param string $value the type of ordering.
     * @param string $type  filter type.
     *
     * @return bool
     *
     * @throws \Exception if the choice of ordering is not supported by the filter.
     */
    public function validate($value, $type)
    {
        switch ($value) {
            case 'newest':
            case 'oldest':
            case 'relevance':
                return true;
                break;
            default:
                throw new \Exception("The order type values are not correct $type");
        }
    }
}

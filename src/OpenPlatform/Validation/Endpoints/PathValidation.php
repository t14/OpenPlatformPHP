<?php

namespace OpenPlatform\Validation\Endpoints;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Validation class for path endpoints.
 */
class PathValidation implements ValidationInterface
{
    /**
     * @param string $filter
     * @param string $endpoint
     *
     * @return bool
     */
    public function validate($filter, $endpoint)
    {
        $filter;
        $endpoint;

        return true;
    }
}

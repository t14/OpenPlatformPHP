<?php

namespace OpenPlatform\Validation\Endpoints;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class for search validation endpoints.
 */
class SearchValidation implements ValidationInterface
{
    /**
     * @param $filter
     * @param $endpoint
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

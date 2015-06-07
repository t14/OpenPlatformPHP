<?php

namespace OpenPlatform\Validation\Endpoints;

/**
 * Validation for endpoints.
 */
class EndpointsValidationFactory
{
    /**
     * Factory method for endpoint validation.
     *
     * @param string $endpoint
     *
     * @throws \Exception if a validation class does not exist for specified endpoint.
     *
     * @return object Validation object.
     */
    public static function build($endpoint)
    {
        $className = '\\OpenPlatform\\Validation\\Endpoints\\'.ucfirst($endpoint).'Validation';

        if (!class_exists($className)) {
            throw new \Exception("Endpoint: $endpoint does not exist");
        }

        return new $className();
    }
}

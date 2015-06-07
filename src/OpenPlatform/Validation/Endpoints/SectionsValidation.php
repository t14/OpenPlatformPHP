<?php

namespace OpenPlatform\Validation\Endpoints;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class for sections endpoint validation.
 */
class SectionsValidation implements ValidationInterface
{
    /**
     * @param string $type    The type of filter to use for tag.
     * @param string $section The type of filter query to use for tag.
     *
     * @throws \Exception if filter does not exist.
     */
    public function validate($type, $section)
    {
        if ($section !== 'section') {
            throw new \Exception("The section $section does not exist for type: $type");
        }
    }
}

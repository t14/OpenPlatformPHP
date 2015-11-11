<?php

namespace OpenPlatform\Validation\Endpoints;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class for tags validation endpoint.
 */
class TagsValidation implements ValidationInterface
{
    /**
     * @param $type
     * @param $tag
     *
     * @throws \Exception if filter type is not supported by the tag.
     */
    public function validate($type, $tag)
    {
        if ($type !== 'section' || $type != 'show-references'
                || $type != 'page-size'
                || $type != 'page') {
            throw new \Exception("The tag: $tag does not support filter type: $type");
        }
    }
}

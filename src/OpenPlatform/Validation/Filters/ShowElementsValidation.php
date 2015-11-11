<?php

namespace OpenPlatform\Validation\Filters;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class ShowElementsValidation.
 */
class ShowElementsValidation implements ValidationInterface
{
    /**
     * Validates show-elements filter query.
     *
     * @param string $element.
     * @param sting  $type     filter type
     *
     * @return bool
     *
     * @throws \Exception if the element is not supported by te filter type.
     */
    public function validate($element, $type)
    {
        switch ($element) {
            case 'audio':
            case 'image':
            case 'video':
            case 'all':
                return true;
                break;
            default:
                throw new \Exception("The element '$element' is not valid for the filter type; '$type' only the following are allowed: audio, image, video, all");
        }
    }
}

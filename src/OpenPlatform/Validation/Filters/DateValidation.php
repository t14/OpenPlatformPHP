<?php

namespace OpenPlatform\Validation\Filters;

use OpenPlatform\Validation\ValidationInterface;

/**
 * Class for Date Validation.
 */
class DateValidation implements ValidationInterface
{
    const DATE_FORMAT = 'Y-m-d';

    /**
     * Validates the date format.
     *
     * @param string $date
     * @param string $type   The filter type.
     * @param string $format Should be the format Y-m-d.
     *
     * @throws \Exception if the date supplied is not int Y-m-d format.
     */
    public function validate($date, $type, $format = self::DATE_FORMAT)
    {
        $d = \DateTime::createFromFormat($format, $date);
        $valid = $d && $d->format($format) === $date;
        if (!$valid) {
            throw new \Exception(" The date format for filter type: $type must be in the format ".self::DATE_FORMAT);
        }
    }
}

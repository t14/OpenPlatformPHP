<?php

namespace OpenPlatform\Validation\Filters;

/**
 * Filters validation factory class.
 */
class FiltersValidationFactory
{
    private static $type;

    /**
     * Factory method filter validation classes.
     *
     * @param string $type the type of filter
     *
     * @return object of relevant filter validation class.
     *
     * @throws \Exception if the relevant filter validation class does not exist.
     */
    public static function build($type)
    {
        $filter = self::getType($type);
        $className = '\\OpenPlatform\\Validation\\Filters\\'.$filter.'Validation';

        if (!class_exists($className)) {
            throw new \Exception("$type does not exist");
        }

        return new $className();
    }

    /**
     * Determines which type of validation is needed for a filter.
     *
     * @param string $filter
     *
     * @return string
     *
     * @throws \Exception if filter type does not exist.
     */
    public static function getType($filter)
    {
        switch ($filter) {
            case 'section':
            case 'production-office':
            case 'show-references':
            case 'show-fields':
            case 'show-tags':
                self::$type = 'String';
                break;
            case 'page':
            case 'page-size':
                self::$type = 'Integer';
                break;
            case 'show-elements':
                self::$type = 'ShowElements';
                break;
            case 'from-date':
            case 'to-date':
                self::$type = 'Date';
                break;
            case 'order-by':
                self::$type = 'OrderBy';
                break;
            case 'use-date':
                self::$type = 'UseDate';
                break;
            default:
                throw new \Exception('the filter type does not exist');
    }

        return self::$type;
    }
}

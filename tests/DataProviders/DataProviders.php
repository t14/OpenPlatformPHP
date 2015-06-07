<?php

/**
 * Created by PhpStorm.
 * User: t
 * Date: 07/06/15
 * Time: 00:18.
 */
namespace OpenPlatform\Tests\DataProviders;

class DataProviders
{
    public function searchFilterTestProvider()
    {
        $queryValue = 'query';
        $endpoint = 'search';

        return [
            [$endpoint, $queryValue, 'section'],
            [$endpoint, $queryValue, 'production-office'],
            [$endpoint, $queryValue, 'show-references'],
            [$endpoint, $queryValue, 'show-fields'],
            [$endpoint, $queryValue, 'show-tags'],
            [$endpoint, 1, 'page'],
            [$endpoint, 1, 'page-size'],
            [$endpoint, 'audio', 'show-elements'],
            [$endpoint, 'image', 'show-elements'],
            [$endpoint, 'video', 'show-elements'],
            [$endpoint, 'all',   'show-elements'],
            [$endpoint, '2015-05-08', 'from-date'],
            [$endpoint, '2015-05-08', 'to-date'],
            [$endpoint, 'newest', 'order-by'],
            [$endpoint, 'oldest', 'order-by'],
            [$endpoint, 'relevance', 'order-by'],
            [$endpoint, 'published', 'use-date'],
            [$endpoint, 'newspaper-edition', 'use-date'],
            [$endpoint, 'last-modified', 'use-date'],
        ];
    }

    public function sectionFilterTestProvider()
    {
        $queryValue = 'query';
        $endpoint = 'sections';

        return [
            [$endpoint, $queryValue, 'section'],
        ];
    }

    public function tagsFilterTestProvider()
    {
        $queryValue = 'query';
        $endpoint = 'tags';

        return [
            [$endpoint, $queryValue, 'section'],
            [$endpoint, 1, 'page-size'],
            [$endpoint, $queryValue, 'show-references'],
            [$endpoint, 1, 'page'],

        ];
    }

    public function filterTypeTestProvider()
    {
        return [
            ['section', 'String'],
            ['production-office', 'String'],
            ['show-references', 'String'],
            ['show-fields', 'String'],
            ['page', 'Integer'],
            ['page-size', 'Integer'],
            ['show-elements', 'ShowElements'],
            ['from-date', 'Date'],
            ['to-date', 'Date'],
            ['order-by', 'OrderBy'],
            ['use-date', 'UseDate'],
            ['show-tags', 'String'],
        ];
    }
}

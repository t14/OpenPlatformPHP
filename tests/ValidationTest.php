<?php

/**
 * Created by PhpStorm.
 * User: t
 * Date: 25/05/15
 * Time: 21:19.
 */
namespace OpenPlatform\Tests;

use OpenPlatform\Validation\Endpoints\EndpointsValidationFactory;
use OpenPlatform\Validation\Endpoints\SectionsValidation;
use OpenPlatform\Validation\Endpoints\TagsValidation;
use OpenPlatform\Validation\Filters\DateValidation;
use OpenPlatform\Validation\Filters\IntegerValidation;
use OpenPlatform\Validation\Filters\OrderByValidation;
use OpenPlatform\Validation\Filters\ShowElementsValidation;
use OpenPlatform\Validation\Filters\StringValidation;
use OpenPlatform\Validation\Filters\UseDateValidation;
use OpenPlatform\Validation\Filters\FiltersValidationFactory;

class ValidationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Exception
     */
    public function testEndpointsValidationFactory()
    {
        $endpointsVal = new EndpointsValidationFactory();
        $endpointsVal->build('InvalidEndpoint');
    }

    /**
     * @expectedException Exception
     */
    public function testSectionsValidation()
    {
        $endpointsVal = new SectionsValidation();
        $endpointsVal->validate('from-date', 'InvalidInput');
    }

    /**
     * @expectedException Exception
     */
    public function testTagsValidation()
    {
        $endpointsVal = new TagsValidation();
        $endpointsVal->validate('from-date', 'InvalidInput');
    }

    /**
     * @expectedException Exception
     */
    public function testFiltersValidationFactory()
    {
        $filtersVal = new FiltersValidationFactory();
        $filtersVal->build('Invalid filter type');
    }

    /**
     * @dataProvider OpenPlatform\Tests\DataProviders\DataProviders::filterTypeTestProvider
     */
    public function testFiltersTypeValidation($filter, $type)
    {
        $filtersVal = new FiltersValidationFactory();
        $validType = $filtersVal->getType($filter);
        $this->assertEquals($validType, $type);
    }

    /**
     * @expectedException Exception
     */
    public function testDateValidation()
    {
        $endpointsVal = new DateValidation();
        $endpointsVal->validate('15-feb-01', 'from-date');
    }

    /**
     * @expectedException Exception
     */
    public function testIntegerValidation()
    {
        $endpointsVal = new IntegerValidation();
        $endpointsVal->validate('string', 'page');
    }

    /**
     * @expectedException Exception
     */
    public function testOrderByValidation()
    {
        $endpointsVal = new OrderByValidation();
        $endpointsVal->validate('oldie', 'order-type');
    }

    /**
     * @expectedException Exception
     */
    public function testShowElementsValidation()
    {
        $endpointsVal = new ShowElementsValidation();
        $endpointsVal->validate('picture', 'search');
    }

    /**
     * @expectedException Exception
     */
    public function testStringValidation()
    {
        $endpointsVal = new StringValidation();
        $endpointsVal->validate(1, 'search');
    }

    /**
     * @expectedException Exception
     */
    public function testUseDateValidation()
    {
        $endpointsVal = new UseDateValidation();
        $endpointsVal->validate('magazine', 'search');
    }
}

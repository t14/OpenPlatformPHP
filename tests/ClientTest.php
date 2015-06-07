<?php

/**
 * Created by PhpStorm.
 * User: t
 * Date: 25/05/15
 * Time: 21:19.
 */
namespace OpenPlatform\Tests;

use OpenPlatform\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $dataProviders;
    const CONFIG_DIR = '/config/testConfig.yml';

    public function setUp()
    {
        $this->client = new Client(__DIR__.self::CONFIG_DIR);
    }

    public function testDeclarationOfEndpoint()
    {
        $clientObj = $this->client->endPoint('search');
        $this->assertEquals('search', $this->client->getEndpoint());
        $this->assertEquals($this->client, $clientObj);
    }

    /**
     * @expectedException Exception
     */
    public function testEndpointValidation()
    {
        $this->client->endpoint('invalidEndpoint')->filter('football', 'section');
    }

    public function testDeclarationOfHost()
    {
        $this->assertEquals('TESTHOST', $this->client->getHost());
    }

    public function testDeclarationOfApiKey()
    {
        $this->assertEquals('TESTAPIKEY', $this->client->getApiKey());
    }

    public function testConfigOverride()
    {
        $client = new Client(__DIR__.self::CONFIG_DIR);
        $clientObj = $client->apiKey('overridden api key');
        $clientObj2 = $client->host('overridden host');
        $this->assertEquals('overridden api key', $client->getApiKey());
        $this->assertEquals('overridden host', $client->getHost());
        $this->assertEquals($client, $clientObj);
        $this->assertEquals($client, $clientObj2);
    }

    public function testFilterCreation()
    {
        $filter['page'] = 1;
        $this->client->endpoint('tags')->filter(1, 'page');
        $this->assertEquals($filter, $this->client->getFilter());
    }

    /**
     * @expectedException Exception
     */
    public function testfilterValidation()
    {
        $this->client->endpoint('search')->filter('football', 'invalidFilterType');
    }

    public function testQueryBuilding()
    {
        $clientObj = $this->client->endpoint('search')
            ->filter('politcs', 'section')
            ->searchQuery('election result');

        $this->assertEquals('election result', $this->client->getSearchQuery());
        $this->assertEquals($clientObj, $this->client);
    }

    /**
     * @dataProvider OpenPlatform\Tests\DataProviders\DataProviders::searchFilterTestProvider
     */
    public function testSearchFilters($endpoint, $query, $type)
    {
        $client = new Client(__DIR__.self::CONFIG_DIR);
        $clientObj = $client->endpoint($endpoint)->filter($query, $type);

        $this->assertEquals($client, $clientObj);
    }

    /**
     * @dataProvider OpenPlatform\Tests\DataProviders\DataProviders::sectionFilterTestProvider
     */
    public function testSectionFilters($endpoint, $query, $type)
    {
        $client = new Client(__DIR__.self::CONFIG_DIR);
        $clientObj = $client->endpoint($endpoint)->filter($query, $type);

        $this->assertEquals($client, $clientObj);
    }

    /**
     * @dataProvider OpenPlatform\Tests\DataProviders\DataProviders::tagsFilterTestProvider
     */
    public function testTagsFilters($endpoint, $query, $type)
    {
        $client = new Client(__DIR__.self::CONFIG_DIR);
        $clientObj = $client->endpoint($endpoint)->filter($query, $type);

        $this->assertEquals($client, $clientObj);
    }
}

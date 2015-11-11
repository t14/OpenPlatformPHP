<?php

namespace OpenPlatform;

require 'vendor/autoload.php';
use GuzzleHttp\Exception\RequestException;
use OpenPlatform\Validation\Filters\FiltersValidationFactory;
use OpenPlatform\Validation\Endpoints\EndpointsValidationFactory;

/**
 * Support methods for easy consumption of the Guardian Open Platform API.
 */
class Client
{
    protected $host;
    protected $apiKey;
    protected $config = [];
    protected $searchQuery;
    protected $endpoint;
    protected $filter = [];
    protected $validate;

    /**
     * Sets config.
     *
     * @param string $host
     * @param string $apiKey
     *
     */
    public function __construct($host, $apiKey)
    {
        $this->host = $host;
        $this->apiKey = $apiKey;
    }

    /**
     * Sets the host value.
     * Makes it possible to override the values set in config if there is
     * a need needed.
     *
     * @param $host api host. This would typically be (http://content.guardianapis.com)
     *
     * @return $this
     */
    public function host($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Getter method for $this->host property.
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set the apiKey value. Makes it possible to override default
     * config if there is a need.
     *
     * @param string $apiKey
     *
     * @return $this
     */
    public function apiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Getter method for API key.
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Set endpoint value.
     *
     * @param string $endpoint
     *
     * @return $this
     */
    public function endpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Getter method for endpoint property.
     *
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Sets the filter values.
     *
     * @see EndpointsValidationFactory used here to check for valid endpoints
     * @see filtersValidationFactory used here to check for valid filter useage
     *
     * @param string|int $query The associated query value for chosen filter
     *                          for example a filter of type 'page' could have a query value of 2 te
     *                          represent the page number that should be returned
     * @param string     $type  Name of filter type to use
     *
     * @return $this
     */
    public function filter($query, $type)
    {
        $validation = new FiltersValidationFactory();
        $endpointsValid = new EndpointsValidationFactory();

        // check endpoint supports filter
        $endpointsValid::build($this->endpoint);

        // validate query values.
        $validation::build($type)->validate($query, $type);
        $this->filter[$type] = $query;

        return $this;
    }

    /**
     * Getter method for filter property.
     *
     * @return array
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * Sets the search query values.
     *
     * @param $searchQuery
     *
     * @return $this
     */
    public function searchQuery($searchQuery)
    {
        $this->searchQuery = $searchQuery;

        return $this;
    }

    /**
     * Getter for searchQuery property.
     *
     * @return mixed
     */
    public function getSearchQuery()
    {
        return $this->searchQuery;
    }

    /**
     * Builds elements of the final URL.
     * This includes filter, search query and API key.
     *
     * @return array|null
     */
    protected function buildQuery()
    {
        $query = !empty($this->filter) ? $this->filter : null;
        !empty($this->searchQuery) ? $query['q'] = $this->searchQuery : null;
        $query['api-key'] = $this->apiKey;

        return $query;
    }

    /**
     * Uses Guzzle client class to consume the Guardian Open Platform API.
     *
     * @return \GuzzleHttp\Message\ResponseInterface
     *
     * @throws \Exception       if no endpoint is set.
     * @throws RequestException if there is problem with the request.
     */
    public function getContent()
    {
        if (empty($this->endpoint)) {
            throw new \Exception('You have not set an endpoint');
        }

        $client = new \GuzzleHttp\Client();
        try {
            $url = $this->host.'/'.$this->endpoint;
            //var_dump($url . $this->buildQuery());
            $query = $this->buildQuery();
            print_r($query);
            $res = $client->request('GET', $url, ['query' => 
                [
                  'api-key' => $this->apiKey,
                  'q' => $this->searchQuery,
                  $this->filter
                ]
             ]);

            return $res;
        } catch (RequestException $e) {
            echo $e->getMessage()."\n";
            if ($e->hasResponse()) {
                echo $e->getResponse()."\n";
            }
        }
    }
}

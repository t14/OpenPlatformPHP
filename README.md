Master [![Build Status](https://travis-ci.org/t14/OpenPlatformPHP.svg?branch=master)](https://travis-ci.org/t14/OpenPlatformPHP.svg?branch=master)
Dev [![Build Status](https://travis-ci.org/t14/OpenPlatformPHP.svg?branch=dev)](https://travis-ci.org/t14/OpenPlatformPHP.svg?branch=dev)

#Guardian Open Platform PHP Client

This is a PHP based client library that aims to provide an easy to use option for consuming
The Guardian NewsPapers [Open Platform API](http://open-platform.theguardian.com/).

#Before you get started
Before you get started you need to get an api key which you can obtain [here](http://open-platform.theguardian.com/access/)

##Installation
Using composer ``composer require t14/open-platform-php``
Create a config.yml file like the one below and add your api key.
```
# Open Platform Config
- host:
  - 'http://content.guardianapis.com'
- apiKey:
  - 'YOUR API KEY HERE'
```

##Basic Usage
Edit the config.yml file and replace the api key with your own.
You can choose to use a different YAML config file (see the config section below)

```php
require 'vendor/autoload.php';
use OpenPlatform\Client;

$op = new Client('DIR_OF_CONFIG_FILE/config.yml');

$op->endpoint('search')
   ->filter('politics', 'section')
   ->filter('newest', 'order-by')
   ->searchQuery('latest election news')
   ->getContent()->getBody();

```
The `getContent()` returns a Guzzle client object making it possible to chain a different method other than `getBody()`
[See Guzzle documentation for more information](http://docs.guzzlephp.org/en/latest/request-options.html)

The `searchQuery('my free text search')` method allows you to add a free text search to your query. You also have the option to specify
filters and use different endpoints.

##Endpoints
You can query a different endpoint by passing the name of the endpoint as a parameter to the `endpoint('nameOfEndpoint')` method.
For example to query the sections endpoint you could do the following

```php
$op->endpoint('sections')
   ->searchQuery('business')
   ->getContent()->getBody();
```

##Filters
You can chain the `filter` method to the `endpoint` method and then to its self allowing you to set multiple filters.
Each endpoint supports certain filters and an exception will be thrown if you try to use an incompatible filter to
to check which filters are supported by which endpoint you can use the [content explorer](open-platform.theguardian.com)

The filter method takes a query as its first parameter and the name of the filter you want to use as its second parameter.
For example if you would like to use the 'search' endpoint and filter your results to only show a single page,
ordered by the most recent from the 'politics' section you could do the following;

```php
$op->endpoint('search')
    ->filter('politics', 'section')
    ->filter('newest', 'order-by')
    ->filter(1, 'page')
    ->getContent()->getBody();
```

##Useful resources
This library is largely based on the Open Platform [content explorer](open-platform.theguardian.com). You can use it
to help you find out which filters are compatible with which endpoints, see what kind of results your queries return and
more.
open-platform.theguardian.com

##Contributing
Please feel free to fork this repo and open a pull request.
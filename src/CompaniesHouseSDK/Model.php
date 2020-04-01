<?php declare(strict_types=1);

namespace Productivv\CompaniesHouseSDK;

use Productivv\CompaniesHouseSDK\CompaniesHouse;

abstract class Model
{
    private $client;

    public function __construct(string $apiKey)
    {
        $this->client = new CompaniesHouse($apiKey);
    }

    public function next() : self
    {

        return $this;
    }

    public function __set(string $name, $value) : self
    {
        $method = $this->methodiseString($name);

        if (method_exists($this, 'set' . $method)) {
            $this->{'set' . $method}($value);
        } else {
            $this->{$name} = $value;
        }

        return $this;
    }

    public function __get(string $name)
    {
        $method = $this->methodiseString($name);

        if (method_exists($this, 'get' . $method)) {
            return $this->{'get' . $method}();
        } else {
            return $this->{$name};
        }
    }

    private function methodiseString(string $method) : string
    {
        $method = str_replace('_', ' ', trim($method));
        $method = ucwords($method);
        $method = preg_replace('/[^A-Za-z0-9\-_]/', '', str_replace(' ', '', $method));

        return $method;
    }
}

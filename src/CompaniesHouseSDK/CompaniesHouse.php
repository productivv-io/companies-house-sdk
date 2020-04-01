<?php declare(strict_types=1);

namespace Productivv\CompaniesHouseSDK;

/**
 *
 */
use GuzzleHttp;

/**
 *
 */
class CompaniesHouse
{
    /**
     *
     */
    const ENDPOINT = 'https://api.companieshouse.gov.uk';
    
    /**
     * [$apiKey description]
     * @var [type]
     */
    private $apiKey;

    /**
     * [$client description]
     * @var [type]
     */
    private $client;

    /**
     * [__construct description]
     * @param string $apiKey [description]
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;

        $this->client = new GuzzleHttp\Client([
            'base_uri'  =>  self::ENDPOINT,
            'auth'      =>  [$this->apiKey, '']
        ]);
    }

    /**
     * [get description]
     * @param  string $path    [description]
     * @param  array  $payload [description]
     * @return [type]          [description]
     */
    public function get(string $path, array $payload = []) : array
    {
        $res = $this->client->request('GET', $path, ['query' => $payload]);
        return json_decode($res->getBody()->getContents(), true);
    }
}

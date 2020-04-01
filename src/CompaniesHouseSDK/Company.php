<?php declare(strict_types=1);

namespace Productivv\CompaniesHouseSDK;

use Productivv\CompaniesHouseSDK\CompaniesHouse;
use Productivv\CompaniesHouseSDK\Model;
use Productivv\CompaniesHouseSDK\CompanyOfficers;
use Productivv\CompaniesHouseSDK\PersonsWithSignificantControl;

/**
 * https://developer.companieshouse.gov.uk/api/docs/company/company_number/companyProfile-resource.html
 */
final class Company extends Model
{
    private $client;
    private $apiKey;
    private $company_number;
    private $officers;
    private $personsWithSignificantControl;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new CompaniesHouse($apiKey);
    }

    public function fetch(string $companyNumber) : self
    {
        $company = $this->client->get('/company/' . $companyNumber);
        $this->company_number = $companyNumber;

        foreach ($company as $key => $val) {
            $this->{$key} = $val;
        }

        return $this;
    }

    public function getOfficers($companyNumber = null) : CompanyOfficers
    {
        if (!$companyNumber) {
            $companyNumber = $this->company_number;
        }

        $this->officers = (new CompanyOfficers($this->apiKey))->fetch($companyNumber);
        return $this->officers;
    }

    public function getPersonsWithSignificantControl($companyNumber = null) : PersonsWithSignificantControl
    {
        if (!$companyNumber) {
            $companyNumber = $this->company_number;
        }

        $this->personsWithSignificantControl = (new PersonsWithSignificantControl($this->apiKey))->fetch($companyNumber);
        return $this->personsWithSignificantControl;
    }
}

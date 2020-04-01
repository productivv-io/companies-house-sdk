<?php declare(strict_types=1);

namespace Productivv\CompaniesHouseSDK;

use Productivv\CompaniesHouseSDK\Model;

/**
 * https://developer.companieshouse.gov.uk/api/docs/company/company_number/officers/officerList-resource.html
 */
final class CompanyOfficers extends Model
{
    public function fetch(string $companyNumber) : self
    {
        $officers = $this->client->get('/company/' . $companyNumber . '/officers');

        foreach ($officers as $key => $val) {
            $this->{$key} = $val;
        }

        return $this;
    }
}

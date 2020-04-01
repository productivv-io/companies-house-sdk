<?php declare(strict_types=1);

namespace Productivv\CompaniesHouseSDK;

use Productivv\CompaniesHouseSDK\Model;

/**
 * https://developer.companieshouse.gov.uk/api/docs/company/company_number/persons-with-significant-control/listPersonsWithSignificantControl.html
 */
final class PersonsWithSignificantControl extends Model
{
    public function fetch(string $companyNumber) : self
    {
        $pwsc = $this->client->get('/company/' . $companyNumber . '/persons-with-significant-control');

        foreach ($pwsc as $key => $val) {
            $this->{$key} = $val;
        }

        return $this;
    }
}

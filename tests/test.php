<?php
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
// use PHPUnit\Framework\TestCase;

// class EmailTest extends TestCase
// {
//     public function testCanBeCreatedFromValidEmailAddress(): void
//     {
//         $this->assertInstanceOf(
//             Email::class,
//             Email::fromString('user@example.com')
//         );
//     }

//     public function testCannotBeCreatedFromInvalidEmailAddress(): void
//     {
//         $this->expectException(InvalidArgumentException::class);

//         Email::fromString('invalid');
//     }

//     public function testCanBeUsedAsString(): void
//     {
//         $this->assertEquals(
//             'user@example.com',
//             Email::fromString('user@example.com')
//         );
//     }
// }


use Productivv\CompaniesHouseSDK\Company;
$company = new Company('7Zcirw4QU6gAScjQ72lLRR1-uAsboIDNIVgYEhqV');
$company->fetch('02845800');
print_r($company->officers);

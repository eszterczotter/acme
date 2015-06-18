<?php
namespace Tests\Api;
use \IntegratorTester;

class PresenceCest
{
    public function _before(IntegratorTester $I)
    {
    }

    public function _after(IntegratorTester $I)
    {
    }

    // tests
    public function apiShouldBeLive(IntegratorTester $I)
    {
        $I->amOnPage('api');
        $I->see('API');
        $I->see('0.0.0');
    }
}
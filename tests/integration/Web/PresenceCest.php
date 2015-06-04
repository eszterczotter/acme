<?php

namespace Tests\Web;

use IntegratorTester;

class PresenceCest
{
    public function _before(IntegratorTester $I)
    {
    }

    public function _after(IntegratorTester $I)
    {
    }

    // tests
    public function webAppShouldBeLive(IntegratorTester $I)
    {
        $I->amOnPage('/');
        $I->seeElement('html');
        $I->see('0.0.0');
    }
}

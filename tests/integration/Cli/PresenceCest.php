<?php

namespace Tests\Cli;

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
    public function shellShouldBePresent(IntegratorTester $I)
    {
        $I->runShellCommand("./acme");
        $I->seeInShellOutput("Acme");
        $I->seeInShellOutput('0.0.0');
    }
}

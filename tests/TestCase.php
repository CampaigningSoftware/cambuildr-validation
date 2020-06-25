<?php

namespace CampaigningBureau\CambuildrValidation\Tests;

use CampaigningBureau\CambuildrValidation\CambuildrValidationServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            CambuildrValidationServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
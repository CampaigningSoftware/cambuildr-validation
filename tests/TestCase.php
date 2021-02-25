<?php

namespace CampaigningSoftware\CambuildrValidation\Tests;

use CampaigningSoftware\CambuildrValidation\CambuildrValidationServiceProvider;

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
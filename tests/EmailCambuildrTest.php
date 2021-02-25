<?php


namespace CampaigningSoftware\CambuildrValidation\Tests;


use CampaigningSoftware\CambuildrValidation\Rules\EmailCambuildr;

class EmailCambuildrTest extends TestCase
{
    /**
     * @var EmailCambuildr
     */
    private $rule;

    public function setUp(): void
    {
        parent::setUp();

        $this->rule = (new EmailCambuildr());
    }

    /**
     * @test
     */
    public function shouldAllowValidEmailAddress()
    {
        $this->assertRulePasses('email@example.com');
        $this->assertRulePasses('email@example.ac.at');
        $this->assertRulePasses('email@ex-ample.com');
    }

    /**
     * @test
     */
    public function shouldAllowEmailWithSingleCharacterDomainPart()
    {
        $this->assertRulePasses('email@a.example.com');
    }

    /**
     * @test
     */
    public function shouldNotAllowEmailWithDashAsLastDomainPart()
    {
        $this->assertRuleFails('email@example.co-m');
    }

    /**
     * @test
     */
    public function shouldNotAllowEmailWithoutTld()
    {
        $this->assertRuleFails('email@example');
    }

    protected function assertRulePasses(string $value)
    {
        $this->assertTrue($this->rulePasses($value));
    }

    protected function assertRuleFails(string $value)
    {
        $this->assertFalse($this->rulePasses($value));
    }

    public function rulePasses(string $value): bool
    {
        return $this->rule->passes('attribute', $value);
    }
}
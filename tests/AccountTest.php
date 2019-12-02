<?php

namespace Waplugin\Tests;

use PHPUnit\Framework\TestCase;
use Waplugin\Tests\SetupEnvironment;
use Waplugin\Config;
use Waplugin\Account;

class AccountTest extends TestCase
{
    use SetupEnvironment;

    public function setUp()
    {
        parent::setUp();

        $this->setDotEnv();
    }

    /**
     * @group account
     */
    public function testAccount()
    {
        $params = [];

        Config::$secretKey = getenv('SECRET_KEY');

        $result = Account::index($params);

        $this->assertInternalType('array', $result);
    }

    /**
     * @group account
     */
    public function testAccountShow()
    {
        $account_id = 1;

        Config::$secretKey = getenv('SECRET_KEY');

        $result = Account::show($account_id);

        $this->assertInternalType('array', $result);
    }
}
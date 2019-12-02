<?php

namespace Waplugin\Tests;

use PHPUnit\Framework\TestCase;
use Waplugin\Tests\SetupEnvironment;
use Waplugin\Config;
use Waplugin\Wa;

class WaTest extends TestCase
{
    use SetupEnvironment;

    public function setUp()
    {
        parent::setUp();

        $this->setDotEnv();
    }

    /**
     * @group wa
     */
    public function testStatus()
    {
        $account_id = 1;

        Config::$secretKey = getenv('SECRET_KEY');

        $result = Wa::status($account_id);

        $this->assertInternalType('array', $result);
    }

    /**
     * @group wa
     */
    public function testSend()
    {
        $account_id = 1;

        $params['phone'] = '6281xxxxxx';
        $params['msg'] = 'Lorem Ipsum Dolar Sit Maet';

        Config::$secretKey = getenv('SECRET_KEY');

        $result = Wa::send($account_id, $params);

        $this->assertInternalType('array', $result);
    }
}
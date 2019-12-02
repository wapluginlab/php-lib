<?php

namespace Waplugin\Tests;

use Dotenv\Dotenv;

trait SetupEnvironment
{
    public function setDotEnv()
    {
        /**
         * Load environment variables
         */
        $dotenv = Dotenv::create(__DIR__ . '/..');
        $dotenv->load();
        
        parent::setUp();
    }
}

<?php

namespace Waplugin;

class Config
{
    public static $secretKey;

    const PRODUCTION_BASE_URL = 'https://waplugin.com/api';

    /**
     * Get baseUrl
     * 
     * @return string WAPLUGIN API URL, depends on $isProduction
     */
    public static function getBaseUrl()
    {
        return Config::PRODUCTION_BASE_URL;
    }
}
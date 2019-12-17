<?php

namespace Waplugin;

class Account
{
    /**
     * Get Accounts
     *
     * @param  array $params
     * @return array
     * @throws Exception curl error
     */
    public static function index($params)
    {
        return (Account::getIndex($params));
    }

    /**
     * Get Accounts, returning full API response
     *
     * @param  array $params
     * @return array
     * @throws Exception curl error
     */
    public static function getIndex($params)
    {
        $url = Config::getBaseUrl() . '/account';
        if ($params) {
            $url = Config::getBaseUrl() . '/account/?'.http_build_query($params);
        }

        $result = ApiRequestor::get(
            $url,
            Config::$secretKey,
            false
        );

        return $result;
    }

    /**
     * View Account
     *
     * @param  integer $id
     * @return array
     * @throws Exception curl error
     */
    public static function show($id)
    {
        return (Account::showAccount($id));
    }

    /**
     * View Account, returning full API response
     *
     * @param  integer $id
     * @return array
     * @throws Exception curl error
     */
    public static function showAccount($id)
    {
        $result = ApiRequestor::get(
            Config::getBaseUrl() . '/account/'.$id,
            Config::$secretKey,
            false
        );

        return $result;
    }
}
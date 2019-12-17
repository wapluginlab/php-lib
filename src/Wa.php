<?php

namespace Waplugin;

class Wa
{
    /**
     * WhatsApp Account Status
     *
     * @param  integer $account_id
     * @return array
     * @throws Exception curl error
     */
    public static function status($account_id)
    {
        return (Wa::getStatus($account_id));
    }

    /**
     * WhatsApp Account Status, returning full API response
     *
     * @param  integer $account_id
     * @return array
     * @throws Exception curl error
     */
    public static function getStatus($account_id)
    {
        $result = ApiRequestor::get(
            Config::getBaseUrl() . '/wa/is-connected/'.$account_id,
            Config::$secretKey,
            false
        );

        return $result;
    }

    /**
     * Send WhatsApp Message
     *
     * @param  array $params
     * @return array
     * @throws Exception curl error
     */
    public static function send($account_id, $params)
    {
        return (Wa::sendMessage($account_id, $params));
    }

    /**
     * Send WhatsApp Message, returning full API response
     *
     * @param  array $params
     * @return array
     * @throws Exception curl error
     */
    public static function sendMessage($account_id, $params)
    {
        $result = ApiRequestor::post(
            Config::getBaseUrl() . '/wa/send-message/'.$account_id,
            Config::$secretKey,
            $params
        );

        return $result;
    }
}
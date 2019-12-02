<?php

namespace Waplugin;

class ApiRequestor
{
    /**
     * Send GET request
     * 
     * @param string  $url
     * @param string  $secret_key
     * @param mixed[] $data_hash
     */
    public static function get($url, $secret_key, $data_hash)
    {
        return self::remoteCall($url, $secret_key, $data_hash, false);
    }

    /**
     * Send POST request
     * 
     * @param string  $url
     * @param string  $secret_key
     * @param mixed[] $data_hash
     */
    public static function post($url, $secret_key, $data_hash)
    {
        return self::remoteCall($url, $secret_key, $data_hash, true);
    }

    /**
     * Send request to API server
     * 
     * @param string  $url
     * @param string  $secret_key
     * @param mixed[] $data_hash
     * @param bool    $post
     */
    public static function remoteCall($url, $secret_key, $data_hash, $post = true)
    {
        $ch = curl_init();
        $curl_options = array(
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$secret_key
            ),
            CURLOPT_RETURNTRANSFER => 1
        );

        if ($post) {
            $curl_options[CURLOPT_POST] = 1;
            if ($data_hash) {
                $body = http_build_query($data_hash);
                $curl_options[CURLOPT_POSTFIELDS] = $body;
            } else {
                $curl_options[CURLOPT_POSTFIELDS] = '';
            }
        }

        curl_setopt_array($ch, $curl_options);
        $result = curl_exec($ch);

        if ($result === false) {
            throw new \Exception('CURL Error: ' . curl_error($ch), curl_errno($ch));
        } else {
            try {
                $result_array = json_decode($result, true);

                return $result_array;
            } catch (\Exception $e) {
                throw new \Exception("API Request Error unable to json_decode API response: ".$result . ' | Request url: '.$url);
            }
        }
    }
}
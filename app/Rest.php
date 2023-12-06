<?php

namespace App;

class Rest
{
    private string $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    private function callApi()
    {
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $res = curl_exec($ch);
        sleep(mt_rand(1, 5));
        $res = json_decode($res, JSON_UNESCAPED_UNICODE);
        curl_exec($ch);
        if (curl_errno($ch)) {
            $res = curl_error($ch);
        }
        curl_close($ch);
        return $res;
    }

    /**
     * @return array
     */

    public function getData(): array
    {
        return $this->callApi();
    }
}
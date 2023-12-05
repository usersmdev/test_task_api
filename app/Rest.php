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
        $res = curl_exec($ch);
        $res = json_decode($res, JSON_UNESCAPED_UNICODE);
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
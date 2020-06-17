<?php

namespace Cvar1984\LiteOtp;

abstract class Request
{
    final protected static function request(
        string $url,
        array $data,
        string $method = 'GET',
        bool $verbose = false
    ) : string {
        $ch = curl_init();
        $ua = \Campo\UserAgent::random(
            [
                'device_type' => ['Tablet', 'Mobile']
            ]
        );

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_USERAGENT, $ua);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //2
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_VERBOSE, $verbose);
        $exec = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new \Exception(curl_error($ch));
        }

        curl_close($ch);

        return $exec;
    }
}

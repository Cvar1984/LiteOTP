<?php

namespace Cvar1984\LiteOtp;

class Otp
{
    protected static function post($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $exec = curl_exec($ch);
        curl_close($ch);
        return $exec;
    }

    public static function tokopedia(int $no)
    {
        return self::post(
            'https://www.tokocash.com/oauth/otp',
            'msisdn=' . $no . '&accept=call'
        );
    }
    public static function jdid(int $no)
    {
        return self::post(
            'http://sc.jd.id/phone/sendPhoneSms',
            'phone=' . $no . '&smsType=1'
        );
    }
    public static function phd(int $no)
    {
        return self::post(
            'https://www.phd.co.id/en/users/sendOTP',
            'phone_number=' . $no
        );
    }
}

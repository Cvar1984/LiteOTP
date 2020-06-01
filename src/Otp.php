<?php

namespace Cvar1984\LiteOtp;

class Otp
{
    protected static function post($url, $data)
    {
        $ch = curl_init();
        $ca = openssl_get_cert_locations();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_CAINFO, $ca['default_cert_file']);
        curl_setopt($ch, CURLOPT_CAPATH, $ca['default_cert_file']);
        $exec = curl_exec($ch);
        curl_close($ch);
        return $exec;
    }

    public static function tokopedia(int $no)
    {
        return self::post(
            'https://www.tokocash.com/oauth/otp',
            [
                'msisdn' => $no,
                'accept' => 'call'
            ]
        );
    }
    public static function jdid(int $no)
    {
        return self::post(
            'https://sc.jd.id/phone/sendPhoneSms',
            [
                'phone' => $no,
                'smsType' => '1'
            ]
        );
    }
    public static function phd(int $no)
    {
        return self::post(
            'https://www.phd.co.id/en/users/sendOTP',
            [
                'phone_number' => $no
            ]
        );
    }
    public static function pedulisehat(int $no)
    {
        return self::post(
            'https://passport.pedulisehat.id/v2/sms/captcha',
            [
                'mobile' => $no,
                'mobile_country_code' => '62',
                'channel' => 'WhatsApp',
                '_' => 1691007074597
            ]
        );
    }
}

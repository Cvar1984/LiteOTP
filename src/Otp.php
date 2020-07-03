<?php

namespace Cvar1984\LiteOtp;

final class Otp extends Request
{
    public $version = '2.1.1';
    public $os = PHP_OS;
    public $author = 'Cvar1984';
    public $team = 'BlackHole Security';
    public $date = '13-03-2018'; // date of birth
    public $github = 'https://github.com/Cvar1984';

    public static function tokopedia(int $no, bool $verbose = false) : string
    {
        return self::request(
            'https://www.tokocash.com/oauth/otp',
            [
                'msisdn' => $no,
                'accept' => 'call'
            ],
            'POST',
            $verbose
        );
    }
    public static function jdid(int $no, bool $verbose = false) : string
    {
        return self::request(
            'https://sc.jd.id/phone/sendPhoneSms',
            [
                'phone' => $no,
                'smsType' => '1'
            ],
            'POST',
            $verbose
        );
    }
    public static function phd(int $no, bool $verbose = false) : string
    {
        return self::request(
            'https://www.phd.co.id/en/users/sendOTP',
            [
                'phone_number' => $no
            ],
            'POST',
            $verbose
        );
    }
    public static function pedulisehat(int $no, bool $verbose = false) : string
    {
        return self::request(
            'https://passport.pedulisehat.id/v2/sms/captcha',
            [
                'mobile' => $no,
                'mobile_country_code' => '62',
                'channel' => 'WhatsApp',
                '_' => 1691007074597
            ],
            'POST',
            $verbose
        );
    }
}

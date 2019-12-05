<?php

namespace Cvar1984\LiteOtp;

class Otp
{
    protected static $user_agent;

    function __construct()
    {
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '999999999M');
        if (strtolower(substr(PHP_OS, 0, 3)) == 'win') {
            self::$user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0';
        } else {
            self::$user_agent = 'Mozilla/5.0 (X11; Linux i686; rv:48.0) Gecko/20100101 Firefox/48.0';
        }
    }

    private function post($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, self::$user_agent);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        return curl_exec($ch);
        curl_close($ch);
    }

    public function sendOtp($no, $otp)
    {
        if (isset($no) and is_int($no)) {
            if ($otp === 'tokopedia') {
                return self::post('https://www.tokocash.com/oauth/otp', 'msisdn=' . $no . '&accept=call');
            } elseif ($otp === 'jdid') {
                return self::post('http://sc.jd.id/phone/sendPhoneSms', 'phone=' . $no . '&smsType=1');
            } elseif ($otp === 'phd') {
                return self::post('https://www.phd.co.id/en/users/sendOTP', 'phone_number=' . $no);
            } else {
                throw new \Exception('Wrong OTP server or data type');
            }
        } else {
            throw new \Exception('Phone_number not an integer');
        }
    }
}

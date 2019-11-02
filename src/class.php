<?php

/*
 * This is free and unencumbered software released into the public domain.
 *
 * Anyone is free to copy, modify, publish, use, compile, sell, or
 * distribute this software, either in source code form or as a compiled
 * binary, for any purpose, commercial or non-commercial, and by any
 * means.
 *
 * In jurisdictions that recognize copyright laws, the author or authors
 * of this software dedicate any and all copyright interest in the
 * software to the public domain. We make this dedication for the benefit
 * of the public at large and to the detriment of our heirs and
 * successors. We intend this dedication to be an overt act of
 * relinquishment in perpetuity of all present and future rights to this
 * software under copyright law.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
 * OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * For more information, please refer to <http://unlicense.org/>
 */

class Otp  {
    protected $user_agent;

    function __construct()
    {
        set_time_limit(0);
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '999999999M');
        if(strtolower(substr(PHP_OS, 0, 3)) == 'win') {
            $this->user_agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0';
        }
        else {
            $this->user_agent = 'Mozilla/5.0 (X11; Linux i686; rv:48.0) Gecko/20100101 Firefox/48.0';
        }
    }

    private function post($url,$data)
    {
        $ch=curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        return curl_exec($ch);
        curl_close($ch);
    }

    public function sendOtp($no, $otp)
    {
        if(isset($no) and is_numeric($no)) {
            if($otp === 'tokopedia') {
                return self::post('https://www.tokocash.com/oauth/otp','msisdn='.$no.'&accept=call');
            }

            elseif($otp === 'jdid') {
                return self::post('http://sc.jd.id/phone/sendPhoneSms','phone='.$no.'&smsType=1');
            }

            elseif($otp === 'phd') {
                return self::post('https://www.phd.co.id/en/users/sendOTP','phone_number='.$no);
            }
            else {
                throw new Exception('Wrong OTP server or data type');
            }
        }
        else {
            throw new Exception('Phone_number not numeric');
        }
    }
}

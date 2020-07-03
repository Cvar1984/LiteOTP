<?php

require __DIR__ . '/vendor/autoload.php';

use Cvar1984\LiteOtp\Otp;
use Amp\Parallel\Worker;
use Amp\Promise;

$app = new Otp();

if ($app->os != 'Linux') {
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
$B Author  :$G $app->author
$B Github  :$G $app->github
$B Team    :$G $app->team
$B Version :$G $app->version
$B Date    :$G $app->date
$B OS      :$G $app->os
$R++++++++++++++++++++++++++++++++++++++$X


BANNER;

try {
    if ($argc < 2) throw new \InvalidArgumentException('Read README.md');

    $providers = ['tokopedia', 'jdid', 'phd', 'pedulisehat'];

    if (is_numeric($argv[1])) {
        $number = $argv[1];
        while (1) {
            foreach ($providers as $provider) {
                printf(
                    '%sSend OTP to %s[%s]%s%s',
                    $G,
                    $Y,
                    $number,
                    $X,
                    PHP_EOL
                );
                printf('%sProvider %s[%s]%s%s', $G, $Y, $provider, $X, PHP_EOL);
                $promises[$provider] = Worker\enqueueCallable(
                    '\Cvar1984\\LiteOtp\\Otp::' . $provider,
                    $number
                );
                $responses = Promise\wait(Promise\all($promises));
                /* foreach($responses as $key => $value) */
                /* { */
                /*     echo $value; */
                /* } */
            }
        }
    }

    $fileName = $argv[1];

    if (!is_file($fileName)) throw new \Exception($fileName . ' Is not a file');
    if (!is_readable($fileName)) throw new \Exception('Permission denied');

    $content = file_get_contents($fileName);
    $content = trim($content, " \t\n\r\0\x0B"); //remove whitespace
    $numbers = explode(PHP_EOL, $content);

    while (1) {
        foreach ($providers as $provider) {
            foreach ($numbers as $index => $number) {
                printf(
                    '%sSend OTP to %s[%s]%s%s',
                    $G,
                    $Y,
                    $number,
                    $X,
                    PHP_EOL
                );
                printf('%sProvider %s[%s]%s%s', $G, $Y, $provider, $X, PHP_EOL);
                $promises[$index] = Worker\enqueueCallable(
                    '\Cvar1984\\LiteOtp\\Otp::' . $provider,
                    $number
                );
                $responses = Promise\wait(Promise\all($promises));
            }
        }
    }
} catch (\Exception | \InvalidArgumentException $e) {
    fprintf(STDERR, "%s%s%s\n", $RR, $e->getMessage(), $X);
    exit(1);
}

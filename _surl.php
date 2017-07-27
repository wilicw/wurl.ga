<?php
include "hide.php";
//驗證IP
$i=$_SERVER['HTTP_HOST'].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_HOST'];
$ip1 =base64_encode($i);
$ckname=MD5(MD5(MD5(MD5(MD5($ip1)))));
@$ck=$_COOKIE[$ckname];
@$postkey=$_POST['code'];
@$posturl=urldecode($_POST['url']);


//防止惡意IP
$ip =base64_encode(MD5(base64_encode($i)));
$fileht=".htaccess2";
$file="log/ipdate.dat";
$fileforbid="log/forbidchk.dat";
if(!file_exists($fileht))file_put_contents($fileht,"");
$filehtarr=@file($fileht);
if(in_array($ip."\r\n",$filehtarr))die("Warning:Your IP address are forbided by some reason".$ip);


$time=time();

if(file_exists($fileforbid))
{ if($time-filemtime($fileforbid)>60)unlink($fileforbid);
else{
$fileforbidarr=@file($fileforbid);
if($ip==substr($fileforbidarr[0],0,strlen($ip)))
{
if($time-substr($fileforbidarr[1],0,strlen($time))>600)unlink($fileforbid);
elseif($fileforbidarr[2]>600){file_put_contents($fileht,$ip."\r\n",FILE_APPEND);unlink($fileforbid);}
else{$fileforbidarr[2]++;file_put_contents($fileforbid,$fileforbidarr);}
}
}
}
$str="";

if(!file_exists("log")&&!is_dir("log"))mkdir("log",0777);
if(!file_exists($file))file_put_contents($file,"");
$allowTime = 60;
$allowNum=10;
$uri=$_SERVER['REQUEST_URI'];
$checkip=md5($ip);
$checkuri=md5($uri);
$yesno=true;
$ipdate=@file($file);
foreach($ipdate as $k=>$v)
{ $iptem=substr($v,0,32);
$uritem=substr($v,32,32);
$timetem=substr($v,64,10)+200;
$numtem=substr($v,74);
if($time-$timetem<$allowTime){
if($iptem!=$checkip)$str.=$v;
else{
$yesno=false;
if($uritem!=$checkuri)$str.=$iptem.$checkuri.$time."1\r\n";
elseif($numtem<$allowNum)$str.=$iptem.$uritem.$timetem.($numtem+1)."\r\n";
else
{
if(!file_exists($fileforbid)){$addforbidarr=array($ip."\r\n",time()."\r\n",1);file_put_contents($fileforbid,$addforbidarr);}
file_put_contents("log/forbided_ip.log",$ip."--".date("Y-m-d H:i:s",time())."--".$uri."\r\n",FILE_APPEND);
$timepass=$timetem+$allowTime-$time;
die("Warning: Sorry,you are forbided by refreshing frequently too much, Pls wait for ".$timepass." seconds to continue or send email to info@wurl.ga!<br>your ip code:<br>".$ip);
}
}
}
}
if($yesno) $str.=$checkip.$checkuri.$time."1\r\n";
file_put_contents($file,$str);
if (!empty($_SERVER["HTTP_CLIENT_IP"])){
    $ip = $_SERVER["HTTP_CLIENT_IP"];
}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
    $ip = $_SERVER["REMOTE_ADDR"];
}
$allowTime = 80;
$allowT=md5($ip);
if(!isset($_SESSION[$allowT])){
	$refresh = true;
	$_SESSION[$allowT] = time();
}elseif(time() - $_SESSION[$allowT]>$allowTime){
	$refresh = true;
	$_SESSION[$allowT] = time();
}else{
	$refresh = false;
}

//新增資料


session_start();
if ($postkey==$ck){
    require_once("_conn.php");
	if ($_POST['url']=="s.url.test.wurl.ga"){
	echo "test.good";
	exit();
	}
    ini_set('display_errors', 1);
	if(isset($_POST['button']) && isset($_POST['url'])){
	require_once("cookie/crypt_code.php");
	$url=shortenGoogleUrl($weburl."_view.php?u=".encrypt2(stripslashes($_POST['url']),$urlpassword)."&m=".md5($_POST['url']),$googleapi);
	//$url=stripslashes($_POST['url']);
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$posturl)) {
		echo "WTF";
		exit;
		}
		setcookie($ckname, "", time()-3600);
		$t="0";
		$time=date("Y-m-d");
		mysql_query("insert into `wurl-db` values(null,'$url','$time','$t')");
		$id=mysql_insert_id();
		$result = mysql_query("select `id` from `wurl-db` where `id` = $id");
		$row = @mysql_fetch_assoc($result);
		mysql_close();
	}
	if(isset($_POST['button']) && isset($_POST['url'])){
		echo $weburl2."/",base_convert($row[id],10,36);
	}else{
		echo "No url";
	}
}else{
	echo "WFT";
	exit();
}
?>

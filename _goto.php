<?php
setcookie("php-ck","",time()-"864000","/");
ini_set('display_errors', 1); //顯示錯誤訊息
require_once("_conn.php");
require_once("cookie/mk-cookie.php");
require_once("cookie/crypt_code.php");
require_once("cookie/cookie-l.php");
$s=base_convert($_GET['u'],36,10);
$r = @mysql_fetch_assoc(mysql_query("select `long`,`time` from `wurl-db` where `id` = '$s'"));
$fb1=explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
$fb=explode(":",$fb1[0]);
$ip=$fb[0].$fb[1];

if($ip=="2a032880"){ //FB IP
	$u=urldecode($r['long']);
	mysql_close();
	header("Location:".$u);
	exit();
}
$wurl_ck = $_COOKIE["wurl"];
if($wurl_ck!=""){
	$wurl=urldecode(decrypt($wurl_ck));
	header("Location:".$wurl);
}
	write_ck('php-ck',$goto,10);
	$ck=$_COOKIE['php-ck'];
	if($ck==$goto){
		if($r){
			//刪除cookie
			setcookie("php-ck","",time()-"864000","/");

			$u=urldecode($r['long']);

			$cry_url = encrypt($u);
			setcookie("wurl",$cry_url,time()+"864000","/".$s);

			if($r['time']!="0"||$r['time']!=""){
				sleep($r['time']);
				mysql_close();
				header("Location:./");
				header("HTTP/1.1 301 Moved Permanently");
				header("Location:".$u);
				exit();
			}else{
				mysql_close();
				header("Location:./");
				header("HTTP/1.1 301 Moved Permanently");
				header("Location:".$u);
				exit();
			}
		}else{
			header ('Location:/404.php');
			exit();
		}
	}else{
		header("Location:http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
		exit();
	}
?>

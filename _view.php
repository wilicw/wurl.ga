<?php
ini_set('display_errors', 1); //顯示錯誤訊息
require_once("cookie/crypt_code.php");
require_once("badweb.php");
require_once("_conn.php");
$g=decrypt2($_GET['u'],$urlpassword);
$fb1=explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
$fb=explode(":",$fb1[0]);
$ip=$fb[0].$fb[1];

$u=urldecode($g);

if(isset($_GET['m'])){
	$md2=$_GET['m'];
	$md=md5($g);
	if($md!=$md2){
		header("Location:".$weburl);
		exit();
	}
}
preg_match('@^(?:http://|ftp://|https://)?([^/]+)@i',$u, $matches);
$bade=testbad($matches[1]);
if($bade!="1"&&!isset($_GET['coc'])){
	header("Location:".$weburl."bad.php?u=".$_GET['u']);
}else{
	header("Location:".$u);
	exit();
}


if($ip=="2a032880"){
	header("Location:".$u);
	exit();
}

?>

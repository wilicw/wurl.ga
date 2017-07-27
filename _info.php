<?php
require_once("_conn.php");

$s=base_convert($_GET['id'],36,10);
$r = @mysql_fetch_assoc(mysql_query("select `long`,`time` from `wurl-db` where `id` = '$s'"));
if($r){
	$u=urldecode($r['long'])."+";
	mysql_close();
	header("Location:".$u);
	exit();
}else{
	header ('Location:/404.php');
	exit();
}
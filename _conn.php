<?php
	/*
		匯入 DB.SQL
		填好填滿下面的設定
		php + apache
	*/

	include "hide.php";
	$db_server = "";
	$db_name = "";
	$db_user = "";
	$db_passwd = "";
	$googleapi="";//google api key
	$urlpassword=""; //解碼密碼 不可更改 (可以亂填，之後不可更改)
	$weburl=""; // 網址
	$weburl2=""; //網域
	$webemail="info@wurl.ga";

	if(!@mysql_connect($db_server, $db_user, $db_passwd))die("No DB");
	mysql_query("SET NAMES utf8");
	if(!@mysql_select_db($db_name))die("No DBname");
?>

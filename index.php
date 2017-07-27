<?php
/*
wurl.ga 短網址系統 2017 第10版
William Chang 製作
bootstrap 3.3.7
https://wurl.ga/
加入離線CSS&JS技術
*/

ini_set('display_errors', 1);
    //防止盜取
    include "hide.php";
    $user_lang=htmlspecialchars(substr($_GET['l'],0,2));
    define('COOKIELIFETIME', 7);
    $cookieExpiresOn = (time() - (60*60*24* COOKIELIFETIME));
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach($cookies as $keyCookie => $valCookie) {
            $cookieDet = explode('=', $valCookie);
            $name = trim($cookieDet[0]);
            setcookie($name, '', $cookieExpiresOn);
            setcookie($name, '', $cookieExpiresOn, '/');
        }
    }
	require "html/lang.php"; //語言
	require "html/cookie.php"; // cookie 防刷
	require 'html/head.php';
	require 'html/script.php';//GOOGLE HTTPS
	require 'html/attached.php';//特效
	require 'html/body.php';
?>

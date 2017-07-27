<?php

//判斷語言
error_reporting(E_ALL ^ E_NOTICE);
preg_match('/^([a-z\-]+)/i', $_SERVER['HTTP_ACCEPT_LANGUAGE'], $matches);
$lang = $matches[1];

if (isset($_GET['l'])){
	if ($user_lang===zh){
		require("lang/zh.lang");
	}else if ($user_lang===jp){
		require("lang/jp.lang");
	}else if ($user_lang===en){
		require("lang/en.lang");
	}else if ($user_lang===kr){
		require("lang/kr.lang");
	}else{
		require("lang/en.lang");
	}
}else{
	switch ($lang) {
        case 'zh-cn' :
                header("Location:/zh/");
                exit();
                break;
        case 'zh-CN' :
                header("Location:/zh/");
                exit();
                break;
        case 'zh-hk' :
                header("Location:/zh/");
                exit();
                break;
        case 'zh-HK' :
                header("Location:/zh/");
                exit();
                break;
        case 'zh-tw' :
                header("Location:/zh/");
                exit();
                break;
        case 'zh-TW' :
                header("Location:/zh/");
                exit();
                break;
        case 'ja' :
        	header("Location:/jp/");
                exit();
                break;
        case 'ja-jp' :
        	header("Location:/jp/");
                exit();
                break;
        case 'ko' :
        	header("Location:/kr/");
                exit();
                break;
        case 'ko-kr' :
        	header("Location:/kr/");
                exit();
                break;
        default:
                header("Location:/en/");
                exit();
                break;
	}
}
?>
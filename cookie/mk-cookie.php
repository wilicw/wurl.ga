<?php
function make_ck(){
	$make_cookie = rand(10000,99999).date("y.m.d.h.i.s.a").MD5(date("y.m.d.h.i.s.a")).sha1(date("y.m.d.h.i.s.a")).MD5(rand(10000,99999));
	return $make_cookie;
}

function write_ck($name,$data,$time){
	setcookie($name,$data, time()+$time,"/");
}

function look_ck($name){
	return $COOKIE[$name];
}

function del_ck($name){
	setcookie($name,"", time()-1000,"/");
}

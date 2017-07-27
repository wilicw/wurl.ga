<?php
require_once("mk-cookie.php");
$name=make_ck();
$file = fopen("cookie-l.php","w"); //開啟檔案
fwrite($file,"<?php \$goto='".$name."';");
fclose($file);
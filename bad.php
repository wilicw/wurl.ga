<?php
ini_set('display_errors', 1); //顯示錯誤訊息
require_once("cookie/crypt_code.php");
require_once("badweb.php");
require_once("_conn.php");
$u=$weburl."_view.php?u=".$_GET['u']."&coc=1";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Warning! 警告!</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://unpkg.com/purecss@0.6.2/build/pure-min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<span style="color:white;"><h1>Warning!</h1>
	<p>Is currently going to visit the page being judged as a malicious website or phishing site that you are sure to go to?</p>
	<a href="/"><button class="button-success pure-button">Go back wurl.ga</button></a>
    <a href="<?php echo $u;?>"><button class="button-error pure-button">Continue to this website</button></a>
	<hr>
	<h1>警告!</h1>
	<p>目前要前往的網頁被判斷為惡意網站或釣魚網站，您確定要前往？</p>
	<a href="/"><button class="button-success pure-button">回到wurl.ga</button></a>
    <a href="<?php echo $u;?>"><button class="button-error pure-button">繼續前往</button></a></span>
</body>
   <style scoped>
   		@import url(https://fonts.googleapis.com/earlyaccess/notosanstc.css);
        .button-success,
        .button-error,
        .button-warning,
        .button-secondary {
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        .button-success {
            background: rgb(28, 184, 65); /* this is a green */
        }

        .button-error {
            background: rgb(202, 60, 60); /* this is a maroon */
        }
        body {
            background: #FF3B3B;
        }
        span {
        	font-family: 'Noto Sans TC', sans-serif;
        }

    </style>
</html>

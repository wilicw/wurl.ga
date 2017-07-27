<?php require_once("_conn.php"); ?>
<!DOCTYPE HTML>
<html prefix='og: https://ogp.me/ns#'>
<head>
    <title><?php echo $title;?></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <meta property="og:title" content=<?php echo '"'.$title.'"';?>></meta>
    <meta property="og:type" content="website"></meta>
    <meta property="og:url" content=<?php echo '"'.$weburl.$user_lang.'/"';?>></meta>
    <meta property="og:image" content=<?php echo '"'.$weburl.'headimg.jpg"';?>></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content=<?php echo '"'.$head.'"';?>/>
    <meta name="author" content="William Chang"/>
    <meta name="copyright" CONTENT="William Chang 2017"/>
    <meta name="URL" content=<?php echo '"'.$weburl.$user_lang.'/"';?>/>
    <link rel="Shortcut Icon" type="image/x-icon" href="/favicon.ico" />
    <meta http-equiv="refresh" content="1119;url=''" />

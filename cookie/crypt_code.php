<?php
require_once("_conn.php");
$key = MD5(base64_encode($_SERVER['HTTP_HOST'].$_SERVER['REMOTE_ADDR'].$_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_HOST']));

function encrypt ($encrypt)
{
    $block = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);
    $pad = $block - (strlen($encrypt) % $block);
    $encrypt .= str_repeat(chr($pad), $pad);
    $passcrypt = mcrypt_encrypt(MCRYPT_DES, $key, $encrypt, MCRYPT_MODE_ECB);
    return base64_encode($passcrypt);
}

function decrypt ($decrypt)
{

    $str = mcrypt_decrypt(MCRYPT_DES, $key, base64_decode($decrypt), MCRYPT_MODE_ECB);
    $pad = ord($str[strlen($str) - 1]);
    return substr($str, 0, strlen($str) - $pad);
}

function encrypt2 ($encrypt,$key1)
{
    $block = mcrypt_get_block_size(MCRYPT_DES, MCRYPT_MODE_ECB);
    $pad = $block - (strlen($encrypt) % $block);
    $encrypt .= str_repeat(chr($pad), $pad);
    $passcrypt = mcrypt_encrypt(MCRYPT_DES, $key1, $encrypt, MCRYPT_MODE_ECB);
    return base64_encode(base64_encode($passcrypt));
}

function decrypt2 ($decrypt,$key1)
{

    $str = mcrypt_decrypt(MCRYPT_DES, $key1, base64_decode(base64_decode($decrypt)), MCRYPT_MODE_ECB);
    $pad = ord($str[strlen($str) - 1]);
    return substr($str, 0, strlen($str) - $pad);
}
function shortenGoogleUrl($long_url,$apiKey){
 $postData = array('longUrl' => $long_url, 'key' => $apiKey);

 $jsonData = json_encode($postData);

 $curlObj = curl_init();

 curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);

 curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);

 curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);

 curl_setopt($curlObj, CURLOPT_HEADER, 0);

 curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));

 curl_setopt($curlObj, CURLOPT_POST, 1);

 curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

 $response = curl_exec($curlObj);

 curl_close($curlObj);

 $json = json_decode($response);

 return $json->id;

}
?>

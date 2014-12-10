<?php
set_time_limit(0);
$login = "+79092134606";
$pass = "xedfr[tk19";
$hash = "a9dba258f7cd29db46";
$id = "188178813";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'login.vk.com');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.104 Safari/537.36');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "act=login&_origin=http://vk.com&ip_h=".$hash."&email=".$login."&pass=".$pass);
curl_setopt($ch, CURLOPT_COOKIEJAR, "1cookies.txt");  
curl_setopt($ch, CURLOPT_COOKIEFILE, "1cookies.txt"); 
curl_setopt($ch, CURLOPT_REFERER, "http://m.vk.com/login");

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, "act=load_audios_silent&al=1&gid=0&id=".$id."&please_dont_ddos=2");
curl_setopt($ch, CURLOPT_URL, 'https://vk.com/audio');

$out = curl_exec($ch);
$out = iconv('windows-1251', 'UTF-8', $out);

$head = '/HTTP\/1.1 200 OK
Server: Apache
Date: .*
Content-Type: text\/html; charset=windows-1251
Content-Length: .*
Connection: keep-alive
X-Powered-By: .*
Pragma: no-cache
Cache-control: no-store

<!--.*<!>audio.css,audio.js<!>.*<!>.*<!>.*<!>{"all":\[\[/i';
$foot = '/\]\]}<!>.*/i';
$arr = explode("],[", $out);
curl_close($ch);
$c = count($arr)-1;
$arr[0] = preg_replace($head, "", $arr[0]);
$arr[$c] = preg_replace($foot, "", $arr[$c]);
//print_r($arr);

$arer = $arr[13];
$arr1 = explode("','", $arer);
print_r($arr1);
?>
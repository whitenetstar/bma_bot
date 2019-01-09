<?php
$access_token = 'W0CQtqyQTdztb4t3qB3hetp9XajHsZxcZdQIaMneO08yqOplm52a/2wRpzZ9vdCfC7Pf8Ewz/AC2ywE/bT0DE4mReApYY+HUAVNcVR2uqcIghYQzlhOtI3hEKZREhS95RAOYvgAkYPmqZ3BZSvoWIgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v2/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

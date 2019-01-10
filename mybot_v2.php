<?php

require "vendor/autoload.php";

$access_token = 'W0CQtqyQTdztb4t3qB3hetp9XajHsZxcZdQIaMneO08yqOplm52a/2wRpzZ9vdCfC7Pf8Ewz/AC2ywE/bT0DE4mReApYY+HUAVNcVR2uqcIghYQzlhOtI3hEKZREhS95RAOYvgAkYPmqZ3BZSvoWIgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '695209a4c6640b2d57bbc437b15bdda8';
$uid = 'Ub7e92a80ec459cbb30ee1cb5fde78900';
$content = file_get_contents('php://input');
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('สวัสดีนะจ๊ะหนู');
$response = $bot->pushMessage($uid, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>

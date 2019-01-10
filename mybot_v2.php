<?php

require "vendor/autoload.php";

$access_token = 'W0CQtqyQTdztb4t3qB3hetp9XajHsZxcZdQIaMneO08yqOplm52a/2wRpzZ9vdCfC7Pf8Ewz/AC2ywE/bT0DE4mReApYY+HUAVNcVR2uqcIghYQzlhOtI3hEKZREhS95RAOYvgAkYPmqZ3BZSvoWIgdB04t89/1O/w1cDnyilFU=';
$channelSecret = '695209a4c6640b2d57bbc437b15bdda8';
$uid = 'Ub7e92a80ec459cbb30ee1cb5fde78900';
$bot = new \LINE\LINEBot(new CurlHTTPClient($access_token), [
    'channelSecret' => $channelSecret
]);
$request_body = file_get_contents("php://input");
$signature = new \LINE\LINEBot\Constant\HTTPHeader::LINE_SIGNATURE;
try {
            $events = $bot->parseEventRequest($request_body, $signature[0]);
            } catch (InvalidSignatureException $e) {
                return $e->getMessage();
            } catch (InvalidEventRequestException $e) {
                return $e->getMessage();
            }
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('ทดสอบนะค่ะ');
$response = $bot->pushMessage($uid, $textMessageBuilder);
?>
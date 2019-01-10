<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Theme Template for Twitter Bootstrap</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- <?php

$accessToken = "W0CQtqyQTdztb4t3qB3hetp9XajHsZxcZdQIaMneO08yqOplm52a/2wRpzZ9vdCfC7Pf8Ewz/AC2ywE/bT0DE4mReApYY+HUAVNcVR2uqcIghYQzlhOtI3hEKZREhS95RAOYvgAkYPmqZ3BZSvoWIgdB04t89/1O/w1cDnyilFU=";
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $res_type = $arrayJson['events'][0]['type'];
if($res_type == "follow"){
    $replyToken = $arrayJson['events'][0]['replyToken'];
    $timestamp = $arrayJson['events'][0]['timestamp'];
    $id = $arrayJson['events'][0]['source']['userId'];
    $result_info = getUserProfile($arrayHeader,$id);
     $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา รหัสของคุณคือ ".$id." รูปภาพ : ".$result_info["pictureUrl"];
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
    pushMsg($arrayHeader,$arrayPostData);
    
}elseif($res_type == "message"){
    $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];
   #ตัวอย่าง Message Type "Text + Sticker"
   if($message == "สวัสดี"){
      $arrayPostData['to'] = $id;
      $arrayPostData['messages'][0]['type'] = "text";
      $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
      $arrayPostData['messages'][1]['type'] = "sticker";
      $arrayPostData['messages'][1]['packageId'] = "2";
      $arrayPostData['messages'][1]['stickerId'] = "34";
      pushMsg($arrayHeader,$arrayPostData);
   }
}
   
   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
                                                 
    function getUserProfile($arrayHeader,$uid){
      $strUrl = "https://api.line.me/v2/profile/".$uid;
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);      
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
      $res_arr = json_decode($result,true);
      
        $_SESSION["userId"] = $res_arr["events"][0]["userId"];
        $_SESSION["displayName"] = $res_arr["events"][0]["displayName"];
        $_SESSION["pictureUrl"] = $res_arr["events"][0]["pictureUrl"];
        $_SESSION["statusMessage"] = $res_arr["events"][0]["statusMessage"];      
        
        $user_info["userId"] = $res_arr["events"][0]["userId"];
        $user_info["displayName"] = $res_arr["events"][0]["displayName"];
        $user_info["pictureUrl"] = $res_arr["events"][0]["pictureUrl"];
        $user_info["statusMessage"] = $res_arr["events"][0]["statusMessage"]; 
        return $user_info;
   }
   exit;


?>
<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

include('connect.php');

$vsender = "";
$text = "";
$group_id = "";
$room_id = "";


$access_token = 'fmNHrc+8OIIx+tgpjawlDr2TDDzHydAnrjSCUHC7Hsg2MFGRe9hmLbHw5NKhuGh7NzlkH6E6K4Xcz3SA8Fe9r2wyA5Qc8+IjrSfDnSLVJqXb1aHOW8SSIpqwlEXfW3sJ0kI+M4awg7BbkE6OHlalTgdB04t89/1O/w1cDnyilFU=';


//get_current_date_time
				$dtz = new DateTimeZone("Asia/Bangkok"); //Your timezone
				$now = new DateTime(date("Y-m-d H:i:s"), $dtz);
				date_default_timezone_set("Asia/Bangkok");
				$today = date("Y-m-d H:i:s");

//check type message 
$CHECK_TYPE_MESSAGE = "NO";


// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {

			$CHECK_TYPE_MESSAGE = "YES";

			// Get text sent
			$vsender = $event['source']['userId'];
			$text = $event['message']['text'];
			$group_id = $event['source']['groupId'];
			$room_id = $event['source']['room'];

			/*
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $room_id
			];

			
			//$resultsave = savetodatabase($vsender,$text);

			
			
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];

			

			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";*/
		}
	}
}
echo "OK";

echo "456";



			if($CHECK_TYPE_MESSAGE=="YES")
			{
						$SQLCREATE_SETDATA = "insert into information2_bot(superintendent,message,date_time_send,date_time_create,remark,group_id) values('".$vsender."','".$text."','".$today."','".$today."','remark','".$group_id."')";
						$queryResultinsertSetdata = mysqli_query($link,$SQLCREATE_SETDATA);
						
						
						if (!$queryResultinsertSetdata) 
						{
							//mysqli_rollback($link);
							echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
						}
						else
						{	
							echo "บันทึกข้อมูลเสร็จสมบูรณ์";
						}


													
						mysqli_close($link);

			}






/*function format_date_insert($datainput)
{
		if($datainput!="")
		{
				$aray_time = explode(" ",$datainput);

				$array_date = explode("/",$datainput);
				return  $array_date[2]."-".$array_date[1]."-".$array_date[0]." ".$aray_time;
		}
		else
		{
			return null;
		}

}*/

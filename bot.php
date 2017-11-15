<?php
$access_token = 'r12zSxDyVtTWwGJWrU/HSboMyptxh5WJDD1PuMdcY7uK+qQ81/M8FiDbYI/1doHePeHFrpWRZpiXVub2ni2nGOyckY2FcqH3woD5msPRY4ROOAKFdoWO9tnrtW67C+Y1qpk0QEcl0knS4Hxjbg4itwdB04t89/1O/w1cDnyilFU=';

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
			// Get text sent
			if($text = $event['message']['text'] == "สวัสดี")
			$text = "ว่า";
			else if($text = $event['message']['text'] == "ยังไม่ได้นอน")
			$text = "https://www.youtube.com/watch?v=2A2bghaygv4";
			//else
			//$text = $event['message']['text'];			
			else if($text = $event['message']['text'] == "กินแฟไหนดี" || $text = $event['message']['text'] == "แฟ"){
				$r = rand(1,4); 
				switch ($favcolor) { 
					case "1": $text = "growupcafe"; break; 
					case "2": $text = "ธรรมดา แสนพิเศษ "; break; 
					case "3": $text = "GRIM"; break; 
					case "4": $text = "Galactose"; break; 
					default: $text = "หาร้านใหม่ ๆ บ้าง"; 
				}
				
			}

			else
			$text = "สรุปว่าไงนะ";
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

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

			echo $result . "\r\n";
		}
	}
}
echo "OK";

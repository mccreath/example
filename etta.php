<?php

/*	Configuration */

// Slack webhook URL, from the webhook config page
$slack_webhook_url = "https://hooks.slack.com/services/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";  //dahveedtest

/* test comment */
/* test comment 2 */

/* Grab values from the slash command, create vars for post back to webhook */

$command = $_POST['command'];
$text = $_POST['text'];
$token = $_POST['token'];
$team_id = $_POST['team_id'];
$channel_id = $_POST['channel_id'];
$channel_name = $_POST['channel_name'];
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
	
// Send it back through the webhook
$data = array(
	"username" => "Etta the Ettiquoon",
	"channel" => $channel_id,
	"text" => "Etta the Ettiquoon wonders if this conversation would be better had and more productive in <".$text.">",
 	"mrkdwn" => true,
 	"icon_url" => "http://dmccreath.org/etta/ettiquoon-avatar.gif",
 	"attachments" => array(
 		 array(
			"color" => "#996633",
			"image_url" => "http://dmccreath.org/etta/ettiquoon.jpg"
 		)
 	)
);
$json_string = json_encode($data);        

$ch = curl_init($slack_webhook_url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
curl_setopt($ch, CURLOPT_CRLF, true);                                                               
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    "Content-Type: application/json",                                                                                
    "Content-Length: " . strlen($json_string))                                                                       
);                                                                                                                   
$result = curl_exec($ch);
curl_close($ch);






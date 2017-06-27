<?php

$apiKey = "API_KEY";

$url = 'https://gcm-http.googleapis.com/gcm/send';

$headers = array(
    'Authorization: key=' . $apiKey,
    'Content-type: application/json'
);


$ch = curl_init();

$dataString = json_encode(array(
    'to'           => '/topics/test_topic',
    'notification' => array(
        'body'  => 'body',
        'title' => 'title',
        'icon'  => 'ic_feedback_black_48dp'
    )
));

//set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

curl_close($ch);

echo $result;

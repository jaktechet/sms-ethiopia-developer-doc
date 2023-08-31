<?php

$url = 'your_single_url';
$data = [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => '251xxxxxxxxx',
    'text' => 'your_message',
];
$jsonData = json_encode($data);

$curlHandle = curl_init($url);
curl_setopt($curlHandle, CURLOPT_POST, true);
curl_setopt($curlHandle, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
]);

curl_setopt($curlHandle, CURLOPT_POSTFIELDS,$jsonData);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curlHandle);
curl_close($curlHandle);


if ($response === false) {
    echo 'Curl error: ' . curl_error($curlHandle);
} else {
    // Handle the response
}


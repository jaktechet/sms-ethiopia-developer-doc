<?php

$curlHandle = curl_init();

$data = [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
    'message' => 'your_message',
];

curl_setopt($curlHandle, CURLOPT_URL, 'http://mysms.com/api/send_list');
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_POST, 1);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($curlHandle, CURLOPT_HTTPHEADER, ['Accept: application/json']);

$response = curl_exec($curlHandle);

if ($response === false) {
    echo 'Curl error: ' . curl_error($curlHandle);
} else {
    // Handle the response
}
curl_close($curlHandle);

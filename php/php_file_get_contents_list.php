<?php

$url = 'your_list_url';
$data = [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
    'text' => 'your_message',
];

$jsonData = json_encode($data);

$contextOptions = [
    'http' => [
        'method' => 'POST',
        'header' => [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ],
        'content' => $jsonData
    ]
];

$context = stream_context_create($contextOptions);
$response = file_get_contents($url, false, $context);

if ($response === false) {
    echo 'Request failed';
} else {
    // Handle the response as needed
}

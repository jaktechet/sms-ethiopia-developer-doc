<?php

$data = json_encode(array(
    "username" => "your_username",
    "password" => "your_password",
    "to" => ["9xxxxxxxxx", "9xxxxxxxxx", "9xxxxxxxxx"],
    "text" => "your_message"
));

$options = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-Type: application/json',
        'content' => $data
    )
);

$context = stream_context_create($options);
$response = file_get_contents('your_list_url', false, $context);

if ($response === false) {
    echo "Error fetching data.";
} else {
    echo $response;
}
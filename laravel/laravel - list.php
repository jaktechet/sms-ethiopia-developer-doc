<?php

use Illuminate\Support\Facades\Http;

$response = Http::withHeaders([
    'Accept' => 'application/json',
])->post('your_list_url', [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
    'text' => 'your_message',
]);

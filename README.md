# SMS Service Integration

This project demonstrates how to integrate an SMS service using various programming languages and frameworks. It includes implementations for sending SMS to single and multiple phone numbers via different API endpoints.

## Table of Contents

- [SMS Service Integration](#sms-service-integration)
  - [Table of Contents](#table-of-contents)
  - [Prerequisites](#prerequisites)
  - [Usage](#usage)
    - [1. Laravel](#1-laravel)
      - [Sending SMS to a Single Phone with Laravel](#sending-sms-to-a-single-phone-with-laravel)
      - [Sending SMS to a Multiple Phone with Laravel](#sending-sms-to-a-multiple-phone-with-laravel)
    - [2. Java](#2-java)
      - [Sending SMS to a Single Phone with Java](#sending-sms-to-a-single-phone-with-java)
      - [Sending SMS to a Multiple Phone with Java](#sending-sms-to-a-multiple-phone-with-java)
    - [3. Flutter (Dart)](#3-flutter-dart)
      - [Sending SMS to a Single Phone with flutter](#sending-sms-to-a-single-phone-with-flutter)
      - [Sending SMS to a Multiple Phone with flutter](#sending-sms-to-a-multiple-phone-with-flutter)
    - [4. JavaScript (with `fetch`)](#4-javascript-with-fetch)
      - [Sending SMS to a Single Phone with javascript](#sending-sms-to-a-single-phone-with-javascript)
      - [Sending SMS to a Multiple Phone with javascript](#sending-sms-to-a-multiple-phone-with-javascript)
    - [5. PHP (with `curl`)](#5-php-with-curl)
      - [Sending SMS to a Single Phone with PHP](#sending-sms-to-a-single-phone-with-php)
      - [Sending SMS to a Multiple Phone with PHP](#sending-sms-to-a-multiple-phone-with-php)
    - [6. PHP (with `file_get_contents()`)](#6-php-with-file_get_contents)
      - [Sending SMS to a Single Phone with PHP file\_get\_contents()](#sending-sms-to-a-single-phone-with-php-file_get_contents)
      - [Sending SMS to a Single Phone with PHP file\_get\_contents()](#sending-sms-to-a-single-phone-with-php-file_get_contents-1)
    - [7. Spring Boot (Java)](#7-spring-boot-java)
      - [Sending SMS to a Single Phone with Spring Boot](#sending-sms-to-a-single-phone-with-spring-boot)
      - [Sending SMS to a Multiple Phone with Spring Boot](#sending-sms-to-a-multiple-phone-with-spring-boot)
    - [8. Curl](#8-curl)
      - [Sending SMS to a Single Phone with Curl](#sending-sms-to-a-single-phone-with-curl)
      - [Sending SMS to a Multiple Phone with Curl](#sending-sms-to-a-multiple-phone-with-curl)
  - [Customization](#customization)

## Prerequisites

- Internet connection to access the SMS service API
- Service credentials, username and password, given from the SMS Ethiopia
## Usage

Choose the programming language and framework you are familiar with to send SMS to single or multiple phone numbers.

### 1. Laravel
---

#### Sending SMS to a Single Phone with Laravel

```php
use Illuminate\Support\Facades\Http;

$response = Http::withHeaders([
    'Content-Type' => 'application/json',
])->post('your_single_url', [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => '2519xxxxxxxxx',
    'message' => 'your_message',
]);

// Handle the Response
```

#### Sending SMS to a Multiple Phone with Laravel

```php
use Illuminate\Support\Facades\Http;

$response = Http::withHeaders([
    'Content-Type' => 'application/json',
])->post('your_list_url', [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
    'message' => 'your_message',
]);

// Handle the Response
```


### 2. Java
---

#### Sending SMS to a Single Phone with Java
```java
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.util.List;

public class SmsService {
    public static void main(String[] args) throws Exception {
        HttpClient client = HttpClient.newHttpClient();

        String username = "your_username";
        String password = "your_password";
        String to = "2519xxxxxxxxx";
        String message = "your_message";

        String requestBody = String.format("{'username': '%s', 'password': '%s', 'to': '%s', 'message': '%s'}",
                username, password, to, message);

        HttpRequest request = HttpRequest.newBuilder()
                .uri(new URI("your_single_sms"))
                .header("Content-Type", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(requestBody))
                .build();

        HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
        // Handle the response
    }
}

```
#### Sending SMS to a Multiple Phone with Java
```java
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.util.Arrays;
import java.util.List;

public class SmsService {
    public static void main(String[] args) throws Exception {
        HttpClient client = HttpClient.newHttpClient();

        String username = "your_username";
        String password = "your_password";
        List<String> to = Arrays.asList("2519xxxxxxxxx", "2519xxxxxxxxx", "2519xxxxxxxxx");
        String message = "your_message";

        String requestBody = String.format("{'username': '%s', 'password': '%s', 'to': %s, 'message': '%s'}",
                username, password, to.toString(), message);

        HttpRequest request = HttpRequest.newBuilder()
                .uri(new URI("your_list_url"))
                .header("Content-Type", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(requestBody))
                .build();

        HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
        // Handle the response
    }
}
```

### 3. Flutter (Dart)
---

#### Sending SMS to a Single Phone with flutter
```dart
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class SmsScreen extends StatelessWidget {
  void sendSmsToSinglePhone() async {
    final url = Uri.parse('your_single_url');
    final headers = {'Content-Type': 'application/json'};
    final data = {
      'username': 'your_username',
      'password': 'your_password',
      'to': '2519xxxxxxxxx',
      'message': 'your_message',
    };

    final response = await http.post(url, headers: headers, body: data);

    // Handle the response as needed
    final responseData = json.decode(response.body);
    print(responseData);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Send SMS')),
      body: Center(
        child: ElevatedButton(
          onPressed: sendSmsToSinglePhone,
          child: Text('Send SMS to Single Phone'),
        ),
      ),
    );
  }
}

void main() {
  runApp(MaterialApp(home: SmsScreen()));
}
```

#### Sending SMS to a Multiple Phone with flutter
```dart
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class SmsScreen extends StatelessWidget {
  void sendSmsToMultiplePhones() async {
    final url = Uri.parse('your_list_url');
    final headers = {'Content-Type': 'application/json'};
    final data = {
      'username': 'your_username',
      'password': 'your_password',
      'to': ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
      'message': 'your_message',
    };

    final response = await http.post(url, headers: headers, body: json.encode(data));

    // Handle the response as needed
    final responseData = json.decode(response.body);
    print(responseData);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text('Send SMS')),
      body: Center(
        child: ElevatedButton(
          onPressed: sendSmsToMultiplePhones,
          child: Text('Send SMS to Multiple Phones'),
        ),
      ),
    );
  }
}

void main() {
  runApp(MaterialApp(home: SmsScreen()));
}
```

### 4. JavaScript (with `fetch`)
---

#### Sending SMS to a Single Phone with javascript

```js
function sendSmsToSinglePhone() {
    const url = 'your_single_url';
    const data = {
        username: 'your_username',
        password: 'your_password',
        to: '2519xxxxxxxxx',
        message: 'your_message',
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(responseData => {
            // Handle the response data
        })
        .catch(error => {
            // Handle errors
        });
}
sendSmsToSinglePhone();
```
#### Sending SMS to a Multiple Phone with javascript
```js
function sendSmsToMultiplePhones() {
    const url = 'your_list_url';
    const data = {
        username: 'your_username',
        password: 'your_password',
        to: ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
        message: 'your_message',
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(responseData => {
            // Handle the response data
        })
        .catch(error => {
            // Handle errors
        });
}

sendSmsToMultiplePhones();
```

### 5. PHP (with `curl`)
---
#### Sending SMS to a Single Phone with PHP

```php

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


```
#### Sending SMS to a Multiple Phone with PHP
```php
$url = 'your_list_url';
$data = [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
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
```


### 6. PHP (with `file_get_contents()`)
---
#### Sending SMS to a Single Phone with PHP file_get_contents()

```php
$url = 'your_single_url';
$data = [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => '251xxxxxxxxx',
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
```

#### Sending SMS to a Single Phone with PHP file_get_contents()
```php
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
```


### 7. Spring Boot (Java)
---

#### Sending SMS to a Single Phone with Spring Boot
```java
public void sendSMSRequest() throws ParseException {
	RestTemplate restTemplate = new RestTemplate();
	
	JSONObject request = new JSONObject();
	request.put("username", "your_username");
	request.put("password", "your_password");
	request.put("to", "2519xxxxxxxx");
	request.put("text", "your message");
	
	HttpHeaders headers = new HttpHeaders();
	headers.setContentType(MediaType.APPLICATION_JSON);

	List<HttpMessageConverter<?>> messageConverters = new ArrayList<HttpMessageConverter<?>>();
	messageConverters.add(new StringHttpMessageConverter());
	restTemplate.setMessageConverters(messageConverters);
	
	HttpEntity<String> entity = new HttpEntity<String>(request.toString(), headers);
	ResponseEntity<String> response = restTemplate.postForEntity(
		"your_single_url", 
		entity, 
		String.class
	);	
}
```

#### Sending SMS to a Multiple Phone with Spring Boot
```java
public void sendJsonRequest() throws ParseException {
	RestTemplate restTemplate = new RestTemplate();
	
	JSONObject request = new JSONObject();
	request.put("username", "your_username");
	request.put("password", "your_password");
	request.put("to", ["2519xxxxxxxx", "2519xxxxxxxx", "2519xxxxxxxx"]);
	request.put("text", "your message");
	
	HttpHeaders headers = new HttpHeaders();
	headers.setContentType(MediaType.APPLICATION_JSON);

	List<HttpMessageConverter<?>> messageConverters = new ArrayList<HttpMessageConverter<?>>();
	messageConverters.add(new StringHttpMessageConverter());
	restTemplate.setMessageConverters(messageConverters);
	
	HttpEntity<String> entity = new HttpEntity<String>(request.toString(), headers);
	ResponseEntity<String> response = restTemplate.postForEntity(
		"your_list_url", 
		entity, 
		String.class
	);
}
```

### 8. Curl
---

#### Sending SMS to a Single Phone with Curl

```php
curl -X POST "your_single_url" \
     -H "Content-Type: application/json" \
     -d "username=your_username" \
     -d "password=your_password" \
     -d "to=2519xxxxxxxxx" \
     -d "message=your_message"
```

#### Sending SMS to a Multiple Phone with Curl

```php
curl -X POST "your_list_url" \
     -H "Content-Type: application/json" \
     -d "username=your_username" \
     -d "password=your_password" \
     -d "to[]=2519xxxxxxxxx" \
     -d "to[]=2519xxxxxxxxx" \
     -d "to[]=2519xxxxxxxxx" \
     -d "message=your_message"
```


## Customization
---

- Depending on your SMS service credential, you need to change the following placeholders:
  - your_single_url
  - your_list_url" 
  - your_username 
  - your_password
  - to
  - text.
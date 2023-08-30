# SMS Service Integration

This project demonstrates how to integrate an SMS service using various programming languages and frameworks. It includes implementations for sending SMS to single and multiple phone numbers via different API endpoints.

## Table of Contents

- [SMS Service Integration](#sms-service-integration)
  - [Table of Contents](#table-of-contents)
  - [Prerequisites](#prerequisites)
  - [Usage](#usage)
    - [1. Laravel](#1-laravel)
      - [Sending SMS to a Single Phone](#sending-sms-to-a-single-phone)
      - [Sending SMS to a Multiple Phone](#sending-sms-to-a-multiple-phone)
    - [2. React (JavaScript)](#2-react-javascript)
      - [Sending SMS to a Single Phone with react](#sending-sms-to-a-single-phone-with-react)
      - [Sending SMS to a Multiple Phone with react](#sending-sms-to-a-multiple-phone-with-react)
    - [3. Flutter (Dart)](#3-flutter-dart)
      - [Sending SMS to a Single Phone with flutter](#sending-sms-to-a-single-phone-with-flutter)
      - [Sending SMS to a Multiple Phone with flutter](#sending-sms-to-a-multiple-phone-with-flutter)
    - [4. JavaScript (with `fetch`)](#4-javascript-with-fetch)
      - [Sending SMS to a Single Phone with javascript](#sending-sms-to-a-single-phone-with-javascript)
      - [Sending SMS to a Multiple Phone with javascript](#sending-sms-to-a-multiple-phone-with-javascript)
    - [5. PHP (with `curl`)](#5-php-with-curl)
      - [Sending SMS to a Single Phone with PHP](#sending-sms-to-a-single-phone-with-php)
      - [Sending SMS to a Multiple Phone with PHP](#sending-sms-to-a-multiple-phone-with-php)
    - [6. Spring Boot (Java)](#6-spring-boot-java)
      - [Sending SMS to a Single Phone with Spring Boot](#sending-sms-to-a-single-phone-with-spring-boot)
      - [Sending SMS to a Multiple Phone with Spring Boot](#sending-sms-to-a-multiple-phone-with-spring-boot)
    - [7. Java](#7-java)
      - [Sending SMS to a Single Phone with Java](#sending-sms-to-a-single-phone-with-java)
      - [Sending SMS to a Multiple Phone with Java](#sending-sms-to-a-multiple-phone-with-java)
  - [Customization](#customization)

## Prerequisites

- Internet connection to access the SMS service API
- Service credentials, username and password, given from the SMS Ethiopia
## Usage

Choose the programming language and framework you are familiar with to send SMS to single or multiple phone numbers.

### 1. Laravel
---

#### Sending SMS to a Single Phone

```php
use Illuminate\Support\Facades\Http;

$response = Http::withHeaders([
    'Accept' => 'application/json',
])->post('http://197.156.70.196:9095/api/send_sms', [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => '2519xxxxxxxxx',
    'message' => 'your_message',
]);

// Handle the response as needed
```

#### Sending SMS to a Multiple Phone

```php
use Illuminate\Support\Facades\Http;

$response = Http::withHeaders([
    'Accept' => 'application/json',
])->post('http://197.156.70.196:9095/api/send_list', [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
    'message' => 'your_message',
]);

// Handle the response as needed
```
---
### 2. React (JavaScript)

#### Sending SMS to a Single Phone with react

```js
import axios from 'axios';

const SmsComponent = () => {
  const sendSmsToSinglePhone = async () => {
    const data = {
      username: 'your_username',
      password: 'your_password',
      to: '2519xxxxxxxxx',
      message: 'your_message',
    };

    try {
      const response = await axios.post('http://197.156.70.196:9095/api/send_sms', data, {
        headers: {
          Accept: 'application/json',
        },
      });
      // Handle the response as needed
    } catch (error) {
      // Handle errors
    }
  };
};

export default SmsComponent;
```

#### Sending SMS to a Multiple Phone with react
```js
import axios from 'axios';

const SmsComponent = () => {
  const sendSmsToMultiplePhone = async () => {
    const data = {
      username: 'your_username',
      password: 'your_password',
      to: ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
      message: 'your_message',
    };

    try {
      const response = await axios.post('http://197.156.70.196:9095/api/send_list', data, {
        headers: {
          Accept: 'application/json',
        },
      });
      // Handle the response as needed
    } catch (error) {
      // Handle errors
    }
  };
};

export default SmsComponent;
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
    final url = Uri.parse('http://197.156.70.196:9095/api/send_sms');
    final headers = {'Accept': 'application/json'};
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
    final url = Uri.parse('http://197.156.70.196:9095/api/send_list');
    final headers = {'Accept': 'application/json'};
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
    const url = 'http://197.156.70.196:9095/api/send_single';
    const data = {
        username: 'your_username',
        password: 'your_password',
        to: '2519xxxxxxxxx',
        message: 'your_message',
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
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
    const url = 'http://197.156.70.196:9095/api/send_list';
    const data = {
        username: 'your_username',
        password: 'your_password',
        to: ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
        message: 'your_message',
    };

    fetch(url, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
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
$curlHandle = curl_init();

$data = [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => '2519xxxxxxxxx',
    'message' => 'your_message',
];

curl_setopt($curlHandle, CURLOPT_URL, 'http://197.156.70.196:9095/api/send_sms');
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
```
#### Sending SMS to a Multiple Phone with PHP
```php
$curlHandle = curl_init();

$data = [
    'username' => 'your_username',
    'password' => 'your_password',
    'to' => ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
    'message' => 'your_message',
];

curl_setopt($curlHandle, CURLOPT_URL, 'http://197.156.70.196:9095/api/send_list');
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
```

### 6. Spring Boot (Java)
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
		"http://197.156.70.196:9095/api/send_sms", 
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
		"http://197.156.70.196:9095/api/send_list", 
		entity, 
		String.class
	);
}
```

### 7. Java
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
                .uri(new URI("http://197.156.70.196:9095/api/send_sms"))
                .header("Accept", "application/json")
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
                .uri(new URI("http://197.156.70.196:9095/api/send_list"))
                .header("Accept", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(requestBody))
                .build();

        HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
        // Handle the response
    }
}
```


## Customization

- Depending on your SMS service provider, you might need to adjust the API endpoint URLs, request parameters, and response handling.
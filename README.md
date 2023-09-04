# SMS Service Integration

This project demonstrates how to integrate an SMS service using various programming languages and frameworks. It includes implementations for sending SMS to single and multiple phone numbers via different API endpoints.

# Table of Contents

- [SMS Service Integration](#sms-service-integration)
- [Table of Contents](#table-of-contents)
- [Prerequisites](#prerequisites)
- [Usage](#usage)
  - [Nodejs](#nodejs)
    - [# Sending SMS to a Single Phone with Nodejs](#-sending-sms-to-a-single-phone-with-nodejs)
    - [# Sending SMS to a Multiple Phone with Nodejs](#-sending-sms-to-a-multiple-phone-with-nodejs)
  - [Laravel](#laravel)
    - [# Sending SMS to a Single Phone with Laravel](#-sending-sms-to-a-single-phone-with-laravel)
    - [# Sending SMS to a Multiple Phone with Laravel](#-sending-sms-to-a-multiple-phone-with-laravel)
  - [Java](#java)
    - [# Sending SMS to a Single Phone with Java](#-sending-sms-to-a-single-phone-with-java)
    - [# Sending SMS to a Multiple Phone with Java](#-sending-sms-to-a-multiple-phone-with-java)
  - [Go](#go)
    - [# Sending SMS to a Single Phone with Go](#-sending-sms-to-a-single-phone-with-go)
    - [# Sending SMS to a Multiple Phone with Go](#-sending-sms-to-a-multiple-phone-with-go)
  - [Python](#python)
    - [# Sending SMS to a Single Phone with Python](#-sending-sms-to-a-single-phone-with-python)
    - [# Sending SMS to Multiple Phone with Python](#-sending-sms-to-multiple-phone-with-python)
  - [Dart](#dart)
    - [# Sending SMS to a Single Phone with Dart](#-sending-sms-to-a-single-phone-with-dart)
    - [# Sending SMS to a Multiple Phone with Dart](#-sending-sms-to-a-multiple-phone-with-dart)
  - [JavaScript](#javascript)
    - [# Sending SMS to a Single Phone with javascript](#-sending-sms-to-a-single-phone-with-javascript)
    - [# Sending SMS to a Multiple Phone with javascript](#-sending-sms-to-a-multiple-phone-with-javascript)
  - [PHP (with `curl`)](#php-with-curl)
    - [# Sending SMS to a Single Phone with PHP - curl](#-sending-sms-to-a-single-phone-with-php---curl)
    - [# Sending SMS to a Multiple Phone with PHP - curl](#-sending-sms-to-a-multiple-phone-with-php---curl)
  - [PHP (with `file_get_contents()`)](#php-with-file_get_contents)
    - [# Sending SMS to a Single Phone with PHP - file\_get\_contents()](#-sending-sms-to-a-single-phone-with-php---file_get_contents)
    - [# Sending SMS to a Single Phone with PHP - file\_get\_contents()](#-sending-sms-to-a-single-phone-with-php---file_get_contents-1)
  - [Spring Boot (Java)](#spring-boot-java)
    - [# Sending SMS to a Single Phone with Spring Boot](#-sending-sms-to-a-single-phone-with-spring-boot)
    - [# Sending SMS to a Multiple Phone with Spring Boot](#-sending-sms-to-a-multiple-phone-with-spring-boot)
  - [CSharp (C#)](#csharp-c)
    - [# Sending SMS to a Single Phone with Curl](#-sending-sms-to-a-single-phone-with-curl)
    - [# Sending SMS to a Multiple Phone with Curl](#-sending-sms-to-a-multiple-phone-with-curl)
  - [Curl](#curl)
    - [# Sending SMS to a Single Phone with Curl](#-sending-sms-to-a-single-phone-with-curl-1)
    - [# Sending SMS to a Multiple Phone with Curl](#-sending-sms-to-a-multiple-phone-with-curl-1)
- [Customization](#customization)

# Prerequisites

- Internet connection to access the SMS service API
- Service credentials, username and password, given from the SMS Ethiopia
# Usage

Choose the programming language and framework you are familiar with to send SMS to single or multiple phone numbers.

## Nodejs

### # Sending SMS to a Single Phone with Nodejs
```js
const axios = require('axios');
let data = JSON.stringify({
    "username": "your_username",
    "password": "your_password",
    "to": "9xxxxxxxxx",
    "text": "your_message"
});

let config = {
    method: 'post',
    maxBodyLength: Infinity,
    url: 'your_single_url',
    headers: {
        'Content-Type': 'application/json'
    },
    data : data
};

axios.request(config)
    .then((response) => {
        console.log(JSON.stringify(response.data));
    })
    .catch((error) => {
        console.log(error);
    });
```
### # Sending SMS to a Multiple Phone with Nodejs
```js
const axios = require('axios');
let data = JSON.stringify({
    "username": "your_username",
    "password": "your_password",
    "to": [
        "9xxxxxxxxx",
        "9xxxxxxxxx",
        "9xxxxxxxxx"
    ],
    "text": "your_message"
});

let config = {
    method: 'post',
    maxBodyLength: Infinity,
    url: 'your_list_url',
    headers: {
        'Content-Type': 'application/json'
    },
    data : data
};

axios.request(config)
    .then((response) => {
        console.log(JSON.stringify(response.data));
    })
    .catch((error) => {
        console.log(error);
    });
```
## Laravel
### # Sending SMS to a Single Phone with Laravel

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

### # Sending SMS to a Multiple Phone with Laravel

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

## Java
### # Sending SMS to a Single Phone with Java
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
### # Sending SMS to a Multiple Phone with Java
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

## Go
### # Sending SMS to a Single Phone with Go
```go
package main

import (
    "fmt"
    "strings"
    "net/http"
    "io/ioutil"
)

func main() {

    url := "your_single_url"
    method := "POST"

    payload := strings.NewReader(`{`+"
        "+`
        "username": "your_username",`+"
    "+`
        "password": "your_password",`+"
    "+`
        "to": "9xxxxxxxxx", `+"
    "+`
        "text": "your_message"`+"
    "+`
    }`)

  client := &http.Client {
  }
  req, err := http.NewRequest(method, url, payload)

  if err != nil {
    fmt.Println(err)
    return
  }
  req.Header.Add("Content-Type", "application/json")

  res, err := client.Do(req)
  if err != nil {
    fmt.Println(err)
    return
  }
  defer res.Body.Close()

  body, err := ioutil.ReadAll(res.Body)
  if err != nil {
    fmt.Println(err)
    return
  }
  fmt.Println(string(body))
}
```
### # Sending SMS to a Multiple Phone with Go
```go
package main

import (
  "fmt"
  "strings"
  "net/http"
  "io/ioutil"
)

func main() {

  url := "your_list_url"
  method := "POST"

  payload := strings.NewReader(`{`+"
  "+`
        "username": "your_username",`+"
  "+`
        "password": "your_password",`+"
  "+`
        "to": ["9xxxxxxxxx", "9xxxxxxxxx", "9xxxxxxxxx"], `+"
  "+`
        "text": "your_message"`+"
  "+`
  }`)

  client := &http.Client {
  }
  req, err := http.NewRequest(method, url, payload)

  if err != nil {
    fmt.Println(err)
    return
  }
  req.Header.Add("Content-Type", "application/json")

  res, err := client.Do(req)
  if err != nil {
    fmt.Println(err)
    return
  }
  defer res.Body.Close()

  body, err := ioutil.ReadAll(res.Body)
  if err != nil {
    fmt.Println(err)
    return
  }
  fmt.Println(string(body))
}
```

## Python
### # Sending SMS to a Single Phone with Python
```python
import http.client
import json

conn = http.client.HTTPSConnection("your_single_url")
payload = json.dumps({
  "username": "your_username",
  "password": "your_password",
  "to": "9xxxxxxxxx",
  "text": "your_message"
})
headers = {
  'Content-Type': 'application/json'
}
conn.request("POST", "/", payload, headers)
res = conn.getresponse()
data = res.read()
print(data.decode("utf-8"))
```

### # Sending SMS to Multiple Phone with Python
```python
import http.client
import json

conn = http.client.HTTPSConnection("your_list_url")
payload = json.dumps({
  "username": "your_username",
  "password": "your_password",
  "to": [
    "9xxxxxxxxx",
    "9xxxxxxxxx",
    "9xxxxxxxxx"
  ],
  "text": "your_message"
})
headers = {
  'Content-Type': 'application/json'
}
conn.request("POST", "/", payload, headers)
res = conn.getresponse()
data = res.read()
print(data.decode("utf-8"))
```

## Dart

### # Sending SMS to a Single Phone with Dart
```dart
var headers = {
  'Content-Type': 'application/json'
};
var request = http.Request('POST', Uri.parse('your_single_url'));
request.body = json.encode({
  "username": "your_username",
  "password": "your_password",
  "to": "9xxxxxxxxx",
  "text": "your_message"
});
request.headers.addAll(headers);

http.StreamedResponse response = await request.send();

if (response.statusCode == 200) {
  print(await response.stream.bytesToString());
}
else {
  print(response.reasonPhrase);
}
```

### # Sending SMS to a Multiple Phone with Dart
```dart
var headers = {
  'Content-Type': 'application/json'
};
var request = http.Request('POST', Uri.parse('your_list_url'));
request.body = json.encode({
  "username": "your_username",
  "password": "your_password",
  "to": [
    "9xxxxxxxxx",
    "9xxxxxxxxx",
    "9xxxxxxxxx"
  ],
  "text": "your_message"
});
request.headers.addAll(headers);

http.StreamedResponse response = await request.send();

if (response.statusCode == 200) {
  print(await response.stream.bytesToString());
}
else {
  print(response.reasonPhrase);
}

```

## JavaScript
### # Sending SMS to a Single Phone with javascript

```js
var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
    "username": "your_username",
    "password": "your_password",
    "to": "9xxxxxxxxx",
    "text": "your_message"
});

var requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: raw,
    redirect: 'follow'
};

fetch("your_single_url", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
```
### # Sending SMS to a Multiple Phone with javascript
```js
var myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

var raw = JSON.stringify({
    "username": "your_username",
    "password": "your_password",
    "to": [
        "9xxxxxxxxx",
        "9xxxxxxxxx",
        "9xxxxxxxxx"
    ],
    "text": "your_message"
});

var requestOptions = {
    method: 'POST',
    headers: myHeaders,
    body: raw,
    redirect: 'follow'
};

fetch("your_list_url", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
```

## PHP (with `curl`)
### # Sending SMS to a Single Phone with PHP - curl

```php

$url = 'your_single_url';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'your_single_url',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
      "username": "your_username",
      "password": "your_password",
      "to": "9xxxxxxxx", 
      "text": "your_message"
}',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;

```
### # Sending SMS to a Multiple Phone with PHP - curl
```php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'your_list_url',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
      "username": "your_username",
      "password": "your_password",
      "to": ["9xxxxxxxxx", "9xxxxxxxxx", "9xxxxxxxxx"],
      "text": "your_message"
}',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);
curl_close($curl);

echo $response;
```


## PHP (with `file_get_contents()`)

### # Sending SMS to a Single Phone with PHP - file_get_contents()

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

### # Sending SMS to a Single Phone with PHP - file_get_contents()
```php
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
```


## Spring Boot (Java)
### # Sending SMS to a Single Phone with Spring Boot
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

### # Sending SMS to a Multiple Phone with Spring Boot
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

## CSharp (C#)
### # Sending SMS to a Single Phone with Curl
```c#
var client = new HttpClient();
var request = new HttpRequestMessage(HttpMethod.Post, "your_single_url");

var content = new StringContent("{\r\n      \"username\": \"your_username\",\r\n      \"password\": \"your_password\",\r\n      \"to\": \"9xxxxxxxxx\", \r\n      \"text\": \"your_message\"\r\n}", null, "application/json");

request.Content = content;

var response = await client.SendAsync(request);
response.EnsureSuccessStatusCode();
Console.WriteLine(await response.Content.ReadAsStringAsync());
```
### # Sending SMS to a Multiple Phone with Curl
```c#
var client = new HttpClient();
var request = new HttpRequestMessage(HttpMethod.Post, "your_list_url");

var content = new StringContent("{\r\n      \"username\": \"your_username\",\r\n      \"password\": \"your_password\",\r\n      \"to\": [\"9xxxxxxxxx\", \"9xxxxxxxxx\", \"9xxxxxxxxx\"], \r\n      \"text\": \"your_message\"\r\n}", null, "application/json");

request.Content = content;

var response = await client.SendAsync(request);
response.EnsureSuccessStatusCode();
Console.WriteLine(await response.Content.ReadAsStringAsync());
```


## Curl
### # Sending SMS to a Single Phone with Curl

```php
curl -X POST "your_single_url" \
     -H "Content-Type: application/json" \
     -d "username=your_username" \
     -d "password=your_password" \
     -d "to=2519xxxxxxxxx" \
     -d "message=your_message"
```

### # Sending SMS to a Multiple Phone with Curl

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


# Customization
- Depending on your SMS service credential, you need to change the following placeholders:
  - your_single_url
  - your_list_url" 
  - your_username 
  - your_password
  - to
  - text.
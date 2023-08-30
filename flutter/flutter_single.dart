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

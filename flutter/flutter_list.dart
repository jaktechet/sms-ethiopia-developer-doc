import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class SmsScreen extends StatelessWidget {
  void sendSmsToMultiplePhones() async {
    final url = Uri.parse('your_list_url');
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

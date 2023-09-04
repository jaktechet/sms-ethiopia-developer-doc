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

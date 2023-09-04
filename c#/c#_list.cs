var client = new HttpClient();
var request = new HttpRequestMessage(HttpMethod.Post, "your_list_url");
var content = new StringContent("{\r\n      \"username\": \"your_username\",\r\n      \"password\": \"your_password\",\r\n      \"to\": [\"9xxxxxxxxx\", \"9xxxxxxxxx\", \"9xxxxxxxxx\"], \r\n      \"text\": \"your_message\"\r\n}", null, "application/json");
request.Content = content;
var response = await client.SendAsync(request);
response.EnsureSuccessStatusCode();
Console.WriteLine(await response.Content.ReadAsStringAsync());

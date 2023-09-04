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
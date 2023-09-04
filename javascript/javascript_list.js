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
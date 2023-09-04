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

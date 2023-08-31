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

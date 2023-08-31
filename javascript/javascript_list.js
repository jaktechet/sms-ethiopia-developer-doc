function sendSmsToMultiplePhones() {
    const url = 'your_list_url';
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

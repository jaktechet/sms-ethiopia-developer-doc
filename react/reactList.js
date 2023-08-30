import axios from 'axios';

const SmsComponent = () => {
  const sendSmsToMultiplePhone = async () => {
    const data = {
      username: 'your_username',
      password: 'your_password',
      to: ['2519xxxxxxxxx', '2519xxxxxxxxx', '2519xxxxxxxxx'],
      message: 'your_message',
    };

    try {
      const response = await axios.post('http://197.156.70.196:9095/api/send_list', data, {
        headers: {
          Accept: 'application/json',
        },
      });
      // Handle the response as needed
    } catch (error) {
      // Handle errors
    }
  };
};

export default SmsComponent;

import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse;
import java.util.List;

public class SmsService {
    public static void main(String[] args) throws Exception {
        HttpClient client = HttpClient.newHttpClient();

        String username = "your_username";
        String password = "your_password";
        String to = "2519xxxxxxxxx";
        String message = "your_message";

        String requestBody = String.format("{'username': '%s', 'password': '%s', 'to': '%s', 'message': '%s'}",
                username, password, to, message);

        HttpRequest request = HttpRequest.newBuilder()
                .uri(new URI("http://197.156.70.196:9095/api/send_sms"))
                .header("Accept", "application/json")
                .POST(HttpRequest.BodyPublishers.ofString(requestBody))
                .build();

        HttpResponse<String> response = client.send(request, HttpResponse.BodyHandlers.ofString());
        // Handle the response
    }
}

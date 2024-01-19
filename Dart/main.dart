import 'dart:convert';
import 'package:http/http.dart' as http;

void main() async {
  // Replace these values with your actual data
  String occupationRisk = 'YOUR_OCCUPATION_RISK';
  String customerCode = 'C000051353';
  String customerType = 'INDIVIDUAL';
  String customerName = 'Spidey';
  String customerPhoneNo = '09791278812';
  String customerNRC = '12/MAMAKA(N)564232';
  String userName = 'Autobots';
  String password = '097912789';
  String passwordConfirmation = '097912789';
  String deviceToken = 'c8hFKMIfQGWFzUmdqrODUt:APA91bErww1evPKfaO5y9bq_ZXhptusKtaaOQarOlmmHwaUVhMhQsq-viTK1bKp1v8I1cPr8uJ8X7mf3Xr6z0mpqQCRwjvqBlVheihmxpOR3nnUbSLgD79UkwIi0tTWMNK9w6xATXZuq';

  final apiUrl =
      'http://127.0.0.1:8000/api/app/v1/auth/customer/register';

  // Create a Map to represent the data
  final Map<String, dynamic> postData = {
    'customer_code': customerCode,
    'customer_type': customerType,
    'customer_name': customerName,
    'customer_phoneno': customerPhoneNo,
    'customer_nrc': customerNRC,
    'user_name': userName,
    'password': password,
    'password_confirmation': passwordConfirmation,
    'device_token': deviceToken,
  };

  // Convert the Map to JSON
  final jsonData = json.encode(postData);

  // Make the POST request
  final response = await http.post(
    Uri.parse(apiUrl),
    headers: {

      'Content-Type': 'application/json',
    },
    body: jsonData,
  );

  // Print the response
  print(response.body);
  print(response.statusCode);
}


### Register

- `End Point :  api/app/v1/auth/customer/register`

- `Method    : Post`

- `Headers  Value  `

  -  `Content-Type :  application/json`
  -  `Accept : application/json`

- `Body`

  - `customer_code  : required| string`
  - `customer_type  : required| string`
  - `customer_nam  : required| string`
  - `customer_phoneno` : `required| min:6| max:13| unique`
  - `customer_nrc : required`
  - `user_name  : required`
  - `password : required`
  - `password_confirmation : required  `
  - `device_token  : required`

- `Status Code & Message     `

  - `400 : Validation Error`
  - `201 : Created`

  ```json
  //Example Request
  {
      "customer_code":"C000051354",
      "customer_type":"INDIVIDUAL",
      "customer_name":"ASHLEY",
      "customer_phoneno":"0979127912",
      "customer_nrc":"12/MAMAKA(N)564232",
      "user_name":"Spidey",
      "password":"0979127912",
      "password_confirmation":"0979127912",
      "device_token":"faksljf03asdf",
  }
  //Success Respone
  {
      "meatadata": {
          "isSuccess": true,
          "statusCode": 201,
          "message": "Register Success"
      },
      "data": {
          "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9CY..",
          "customer": {
              "id": 25,
              "customer_code": "C000051353",
              "customer_phoneno": "0979127912",
              "user_name": "Spidey"
          }
      }
  }
  ```



### Login

- `End Point :  api/app/v1/auth/customer/login`
- `Method   : Post`
- `Headers  Value  `
  -  `Content-Type :  application/json`
  -  `Accept : application/json`
- `Body`
  - `customer_phoneno : required`
  - `password : required`
  - `device_token : required`
- `Status Code & Message     `
  - `400 : Validation Error`
  - `401 : Unauthorized`    
  - `200 : Success`

```json
//Example
{
    "customer_phoneno": "0979127912",
    "password": "0979127912",
    "device_token": "0979127912"
}

//Success
{
    "meatadata": {
        "isSuccess": true,
        "statusCode": 200,
        "message": "Login Success"
    },
    "data": {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI...",
        "customer": {
            "id": 20,
            "policy_holder_name": "Spidey Shine",
            "phone_number": "0979127912",
            "user_name": "Spiderverse"
        }
    }
}
```




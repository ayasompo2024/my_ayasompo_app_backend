### Get Token

- End Point   : `api/internal/v1/get-token`
- Method      : `Post`
- Headers  Value  
  -  Content-Type :  `application/json`
- Body
  - access_id    :  `required`
- Error Code & Message     
  - 400 : `Validation Error`
  - 403 :  `Forbidden`

```json
//Example
{ 
    "access_id": "86d6c168-9300-4447-a648-ec2ed4748bc8"
}
//Success
{
    "isSuccess": true,
    "message": "Your Access Token",
    "data": {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...",
        "token_type": "Bearer",
        "expire_in": null,
        "accessor_info": {
            "name": "server1",
            "password": null,
            "access_id": "86d6c168-9300-4447-a648-ec2ed4748bc8"
        }
    },
    "statusCode": 200
}
// Forbidden
{
    "isSuccess": false,
    "message": "access_id Do Not Match",
    "statusCode": 403
}
```





### Send Message

- End Point   : `api/internal/v1/send-message`
- Method      : `Post`
- Headers  Value  
  -  Content-Type :  `application/json`
- Body
  - phone    :  `required,min:6,max:12`
  - customer_code  : `required, min:6, max:15`
  - message  :  `required`
- Response Code & Status     
  - 400 : `Validation Error`
  - 200 : `Success`
  - 500 : `Fail`

```js
   # Example Request
   {
    "phone" : "959787796698",
    "customer_code": "C000051354",
    "message"  : "Hello"
  }

  # If Success
  {
    "isSuccess": true,
    "message": "Your request has been processed",
    "data": {
        "phone": "959787796698",
        "customer_code": "C000051354",
        "message": "Hello"
    },
    "statusCode": 200
  }

  # If Face Validation Error
  {
    "isSuccess": false,
    "message": "Validation Error",
    "errors": {
        "phone": ["The phone field is required."],
        "customer_code": ["The customer code field is required."],
        "message": ["The message field is required."]
    },
    "statusCode": 400
  }
```
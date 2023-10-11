### Send Message
- End Point   : `api/internal/v1/send-message`
- Method      : `Post`
- Headers  Value  
  -  Content-Type :  `application/json`
- Body
  - phone    :  `required,min:6,max:12`
  - customer_code  : `required, min:6, max:15`
  - message  :  `required`
- Response Code & Code     
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
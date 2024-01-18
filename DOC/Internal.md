### Get Token

- `End Point : api/internal/v1/get-token`
- `Method : Post`
- `Headers  Value  `
  -  `Content-Type :  application/json`
  -  `Accept : application/json`
- `Body`
  - `access_id  : required`
- `Error Code & Message     `
  - `400 : Validation Error`
  - `401 : Unauthorized`    

```json
//Example
{ 
    "access_id": "86d6c168-9300-4447-a648-ec2ed4748bc8"
}
//Success
{
    "meatadata": {
        "isSuccess": true,
        "statusCode": 200,
        "message": "Your Access Token"
    },
    "data": {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJS..",
        "token_type": "Bearer",
        "expire_in": null,
        "accessor_info": {
            "name": "server1",
            "password": null,
            "access_id": "86d6c168-9300-4447-a648-ec2ed4748bc8"
        }
    }
}
```



### Send Message

- `End Point : api/internal/v1/send-message`
- `Method   : Post`
- `Headers  Value  `
  -  `Content-Type :  application/json`
  -  `Accept : application/json`
  -  `Authorization : Bearer TOKEN_HERE `
- `Body`
  - `customer_phoneno : required,min:6,max:13`
  - `customer_code  : required`
  - `message  : required`
- `Response Code & Status     `
  - `400 : Validation Error`
  - `200 : Success`

```json
//Example
{
    "customer_phoneno" : "959787796698",
    "customer_code": "C000051354",
    "message"  : "Hello"
}

// Success Response
{
    "meatadata": {
        "isSuccess": true,
        "statusCode": 200,
        "message": "Your request has been processed"
    },
    "data": {
        "customer_phoneno": "959787796698",
        "customer_code": "C000051354",
        "message": "Hello"
    }
}
```
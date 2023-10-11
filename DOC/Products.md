
### Get All Products(Active)
- End Point   :  `api/app/v1/products`
- Method      : `get`
- Headers  Value  
  -  Authorization   :  `Bearer YOUR_TOKEN_HERE`
  -  Content-Type :  `application/json`
- Response Code :   
  - 200 : `Success`
  - 500 : `Error`
```jsons
  //Response
  {
    "isSuccess": true,
    "message": "Products",
    "data": [
        {
            "id": 6,
            "name": "Health",
            "title": "Health  Insurance",
            "product_type": "INDIVIDUAL",
            "thumbnail": "data:image/png;base64,iVBORw...",
            "brief_description": "Health is wealth and AYA SOMPO’s ...",
            "faqs": [
                {
                    "title": "faq1",
                    "desc": "Lorem ipsum may be used as a placeholder .."
                }
            ],
            "properties": [
                {
                    "name": "Coverage",
                    "detail": [
                        {
                            "title": "Surgical Procedure and Miscarriage..",
                            "desc": "Coverage for surgical expenses and miscarriage.."
                        }
                    ]
                },
                {
                    "name": "Benefits",
                    "detail": [
                        {
                            "title": "CRITICAL ILLNESS..",
                            "desc": "Heart Attack\r\nStroke (Permanent)\r\nCancer (Life Threatening)\r\nHeart .."
                        }
                    ]
                }
            ]
        }
    ],
    "statusCode": 200
}
```

### Get Endorsement Form 

- `End Point : api/app/v1/request-form/get-endorsement-form`

- `Method: Post`

- `Headers  Value  `

  -  `Authorization : Bearer TOKEN_HERE? `
  -  `Content-Type :  application/json`
  -  `Accept : application/json`

- `Body`

  - `product_code : required`
  
- `Error Code & Message     `

  - `400 : Validation Error`
  
  ```json
  //Example Request
  {
      "product_code": "ECA"
  }
  
  //Succss Response
  {
      "meatadata": {
          "isSuccess": true,
          "statusCode": 200,
          "message": "Endorsement Request Form"
      },
      "data": [
          {
              "id": 1,
              "type": "Name Chnage"
          },
          {
              "id": 2,
              "type": "Mailing Address Change"
          },
          ...
      ]
  }        
  ```
  
  

### Store Request Form (Create Inquiry Case)

- `End Point : api/app/v1/request-form/store-inquiry-case`

- `Method: Post`

- `Headers  Value  `

  -  `Authorization : Bearer TOKEN_HERE? `
  -  `Content-Type :  application/json`
  -  `Accept : application/json`

- `Body`

  - `reason  : nullable`
  - `effective_date : nullable`
  - `bank_account_number : nullable`
  - `bank_name : nullable `
  - `other_bank_name : nullable`,
  - `other_bank_address : nullable`
  - `customer_type : required`
  - `title : required`
  - `ayasompo_vehicleno : nullable`
  - `ayasompo_customercode  : required `
  - `ayasompo_policyno : required`
  - `ayasompo_productcode : required`
  - `ayasompo_classcode : required`
  - `ayasompo_risksequenceno : required`

- `Error Code & Message     `

  - `400 : Validation Error`

  ```json
  //Example Request
  
  
  //Succss Response    
  
  
  
  ```
  
  

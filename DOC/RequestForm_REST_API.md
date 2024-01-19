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

    

  - `inquiry_type : required` 

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
  - `502 : Upstream Server Error`
  
  ```json
  //Example Request
  {
      "reason": "Hell0 this is test test",
      "effective_date": "2023/11/03",
      "bank_account_number": "7912********",
      "bank_name": "AYA Bank",
      "other_bank_name": "other_bank_name",
      "other_bank_address": "other_bank_address",
      
      "inquiry_type" : "Endorsement",
      "customer_type": "I",
      "title": "Name Change",
      "ayasompo_customercode": "C000051097",
      "ayasompo_policyno": "AYA/YGN/FIR/23000009",
      "ayasompo_productcode": "FIR",
      "ayasompo_classcode": "FI",
      "ayasompo_risksequenceno": "00YGN2300463496"
  }
  
  //Succss Response    
  {
      "meatadata": {
          "isSuccess": true,
          "statusCode": 201,
          "message": "Success InquiryCase"
      },
      "data": {
          "incidentid": "a22a4317-5f7e-ee11-8179-6045bd57c806",
          "ayasompo_casenumber": "AYA-EQ-23000126"
      }
  }
  
  // Upstream server Issue (Error Code maybe 1,2,3)
  {
      "meatadata": {
          "message": "Can not receive Customer ID from upstream server",
          "code": 1,
          "statusCode": 502
      }
  }
  ```
  
  

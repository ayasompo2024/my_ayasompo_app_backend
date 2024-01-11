## Motor Claim Case

- `End Point : api/app/v1/claim-case/motor`

- `Method: Post`

- `Headers  Value  `

  -  `Authorization : Bearer TOKEN_HERE? `
  -  `Content-Type :  application/json`
  -  `Accept : application/json`

- `Body`

  - `contact_fullname : required`

  - `contact_telephone : required`

  - `driver_name : required`

  - `policy_no : required`

  - `accident_location : required`

  - `accident_date : required`

  - `accident_time : required`

  - `accident_description : required`

  - `accident_damaged_portion : required`

  - `vehicle_no : required`

  - `risk_seq_no : required`

  - `accident_damaged_photos : `**`required, array, png,jpg,jpeg,PNG,JPG,JPG`**

  - `signature_image : required, png,jpg,jpeg,PNG,JPG,JPG`

  - `customer_code : required`

  - `product_code : required`

  - `class_code : required`

  - `customer_type : required`

- `Error Code & Message     `

  - `400 : Validation Error`
  - `502 : Upstream Server Error(Bad Grate Way)`
  
  ```json
  //Example Request
  {
  	"contact_fullname" : "test U MOE AUNG MAW ",
  	"contact_telephone" : "09787365517",
  	"driver_name" : "test U MOE AUNG MAW ",
  	"policy_no" : "AYA/YGN/MNF/23000002",
  	"accident_location" : "Neverland",
  	"accident_date" : "12-31-2023",
  	"accident_time" : "12:00 am",
  	"accident_description" : "My car got hit in while stopping for a while in Neverland",
  	"accident_damaged_portion" : "Rare Bumper and Front Light",
  	"vehicle_no" : "1A/9386(YGN)",
  	"risk_seq_no" : "00YGN2300462403",
  	"customer_code" : "C00044491",
  	"product_code" : "MNF",
  	"class_code" : "MT",
  	"customer_type" : "I",
      
      "accident_damaged_photos"  : [ FILE_ONE_HERE, FILE_TWO_HERE ]
      "signature_image"  : FILE_HERE
  }
  
  //sucess response
  {
      "meatadata": {
          "isSuccess": true,
          "statusCode": 201,
          "message": "Claimcase Success(All Step) "
      },
      "data": {
          "id": 27
      }
  }
  
  // Upstream server Issue (Error Code maybe 1,2)
  {
      "meatadata": {
          "message": "Can not upload photo to blob storage",
          "code": 1,
          "statusCode": 502
      }
  }
  ```
  
  

## Non -Motor Claim Case

- `End Point : api/app/v1/claim-case/non-motor`

- `Method: Post`

- `Headers  Value  `

  -  `Authorization : Bearer TOKEN_HERE? `
  -  `Content-Type :  application/json`
  -  `Accept : application/json`

- `Body`

  - `policy_or_risk_name : required`

  - `contact_fullname : required`

  - `contact_telephone : required`

  - `nrc_no : required`

  - `passport_no : required `

  - `product_type : required`

  - `accident_date : required`

  - `accident_time : required`

  - `accident_description : required`

  - `accident_damaged_photos : required | array`

  - `signature_image : required`

  ```js
  //Example Requst
  { 
      "policy_or_risk_name" : "AYA/YGN/LHC/20000040",
      "contact_fullname" : "U MOE AUNG MAW",
      "contact_telephone" : "09787365517",
      "nrc_no" : "9/MAMANA(N)043453",
      "passport_no" : "",
      "accident_date" : "12-31-2023",
  	"product_type" : "Health Insurance",
  	"accident_time" : "12:00 am",
  	"accident_description": "Detailed explanation of the ac",
      
      "accident_damaged_photos"  :  [ FILE_ONE_HERE, FILE_TWO_HERE ]
      "signature_image"  : FILE_HERE
  }    
  
  //Sucess Requst
  {
      "meatadata": {
          "isSuccess": true,
          "statusCode": 201,
          "message": "Claimcase Success(All Step) "
      },
      "data": {
          "id": 2
      }
  }
  
  
  // Upstream server Issue (Error Code maybe 1,2)
  {
      "meatadata": {
          "message": "Can not upload photo to blob storage",
          "code": 1,
          "statusCode": 502
      }
  }


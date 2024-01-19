### Get Location Maps

- `End Point : api/app/v1/location-maps`

- `Method: Get`

- `Headers  Value  `

  -  `Content-Type :  application/json`
  -  `Accept : application/json`

  ```json
  //Success Response
  {
      "meatadata": {
          "isSuccess": true,
          "statusCode": 200,
          "message": "Here are Location Maps"
      },
      "data": {
          "Hospitals and Clinics": [
              {
                  "id": 1,
                  "image": "https://uatecom.ayasompo.com:5007/uploads/location-map/aya_sompo657b05f97f392.jpeg",
                  "name": "Ar Yu International Hospital",
                  "phone": "097877966989",
                  "open_days": "09:00 AM",
                  "open_hour": "05:00 PM",
                  "close_hour": "17:00",
                  "address": "No.459, Room No (403), 4th Floor,.",
                  "latitude": "090023",
                  "longitude": "02932039",
                  "google_map": null,
                  "category_id": 1,
                  "category": {
                      "id": 1,
                      "name": "Hospitals and Clinics",
                      "image": "https://uatecom.ayasompo.com:5007/",
                      "sort": 2
                  }
              }
          ],
          "Workshops": [
              {
                  "id": 2,
                  "image": "https://uatecom.ayasompo.com:5007/uploads/location-map/aya_sompo657b05f97f392.jpeg",
                  "name": "Ar Yu International Hospital",
                  "phone": "097877966989",
                  "open_days": "09:00 AM",
                  "open_hour": "05:00 PM",
                  "close_hour": "17:00",
                  "address": "No.459, Room No (403), 4th Floor,\r\nNovotel Max Hotel",
                  "latitude": "090023",
                  "longitude": "02932039",
                  "google_map": null,
                  "category_id": 2,
                  "category": {
                      "id": 2,
                      "name": "Workshops",
                      "image": "https://uatecom.ayasompo.com:5007/",
                      "sort": 2
                  }
              }
          ]
      }
  }
  ```

  

​	

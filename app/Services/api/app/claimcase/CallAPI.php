<?php
namespace App\Services\api\app\claimcase;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Log;

trait CallAPI
{

    private function CallMotorCaseAPI($data)
    {
        $url = config("app.create_motor_case_base_url") . "external/claimprocess/claimcase/motor";
        try {
            $response = Http::post($url, $data);
            if ($response->successful()) {
                $responseContentJson = json_decode($response->body());
                return $responseContentJson;
            } else {
                $statusCode = $response->status();
                $errorResponse = $response->body();
            }
        } catch (RequestException $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }
    private function CallNonMotorCaseAPI($data)
    {
        $url = config("app.create_motor_case_base_url") . "external/claimprocess/claimcase/non-motor";
        try {
            $response = Http::post($url, $data);
            if ($response->successful()) {
                $responseContentJson = json_decode($response->body());
                return $responseContentJson;
            } else {
                $statusCode = $response->status();
                $errorResponse = $response->body();
            }
        } catch (RequestException $e) {
            Log::error($e->getMessage());
            throw $e;
        }
    }

}


/*


{
    "policy_or_risk_name": "AYA/YGN/LHC/20000040",
    "contact_fullname": "U MOE AUNG MAW",
    "contact_telephone": "09787365517",
    "nrc_no": "9/MAMANA(N)043453",
    "passport_no": "",
    "product_type": "Health Insurance",
    "accident_date": "12-31-2023",
    "accident_time": "12:00 am",
    "accident_description": "Detailed explanation of the accident...",
    "accident_damaged_photos": [
        "https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?fit=crop&w=1280&h=720",
        "https://images.unsplash.com/photo-1572635196184-84e35138cf62?fit=crop&w=1280&h=720",
        "https://images.unsplash.com/photo-1584641911870-6196a92c1920?fit=crop&w=1280&h=720"
    ],
    "signature_image": "https://images.unsplash.com/photo-1522100077728-4fae00f560c8?fit=crop&w=1280&h=720",
    "claim_channel": "app"
}

array:12 [
  "policy_or_risk_name" => "AYA/YGN/LHC/20000040"
  "contact_fullname" => "U MOE AUNG MAW"
  "contact_telephone" => "09787365517"
  "nrc_no" => "9/MAMANA(N)043453"
  "passport_no" => null
  "product_type" => "Health Insurance"
  "accident_date" => "12-31-2023"
  "accident_time" => "12:00 am"
  "accident_description" => "Detailed explanation of the accident..."
  "accident_damaged_photos" => array:2 [
    0 => "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65525e3893ac0bbfad162a21.png?sv=2023-08-03&st=2023-11-13T17%3A34%3A48Z&se=2024-02-11T17%3A34%3A48Z&sr=c&sp=r&sig=cMIwY9ThjKUZ3TgiWbj%2FKt86SvoEXqT5yS7d7i2ZnYk%3D"
    1 => "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65525e3893ac0b1f47162a22.jpg?sv=2023-08-03&st=2023-11-13T17%3A34%3A49Z&se=2024-02-11T17%3A34%3A49Z&sr=c&sp=r&sig=crw7ikzTXRe2E7jur6WSdUXyZ7mcoPUK0pFJ3Rega2s%3D"
  ]
  "signature_image" => "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/external-uploads/65525e3993ac0b7a9d162a23.png?sv=2023-08-03&st=2023-11-13T17%3A34%3A50Z&se=2024-02-11T17%3A34%3A50Z&sr=c&sp=r&sig=vW%2B%2FlbXa%2FUaWoguOZLl0UkgPWDI1Sxu%2BRCXhmZGe46g%3D"
  "claim_channel" => "app"
]

{
    "success": true,
    "data": {
        "crmStatus": "active",
        "status": "open",
        "stage": "open",
        "channel": "App",
        "dynamic365ClaimIntimationOpened": false,
        "_id": "6552580393ac0b6f771629b0",
        "customer": "651eea5c253a064273209cab",
        "reporterContact": {
            "fullname": "U MOE AUNG MAW",
            "telephone": "09787365517"
        },
        "policyNo": "AYA/YGN/LHC/20000040",
        "accidentReport": {
            "accidentDateTime": "2023-12-31T00:00:00.000Z",
            "accidentDescription": "Detailed explanation of the accident...",
            "accidentDamagedPhotos": [
                {
                    "_id": "6552580393ac0bd8c71629b1",
                    "originalUrl": "https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?fit=crop&w=1280&h=720",
                    "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/655257f193ac0b2dd11629ae.jpeg",
                    "uid": "655257f193ac0b2dd11629ae",
                    "type": "image/jpeg",
                    "name": "655257f193ac0b2dd11629ae.jpeg",
                    "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/655257f193ac0b2dd11629ae.jpeg?sv=2023-08-03&st=2023-11-13T17%3A08%3A01Z&se=2024-02-11T17%3A08%3A01Z&sr=c&sp=r&sig=lbf9Ty%2B37KRs7eAzROQpn1jYzLraZ9zx3a8hj2OuUdY%3D",
                    "thumbnailUrl": ""
                },
                {
                    "_id": "6552580393ac0b00091629b2",
                    "originalUrl": "https://images.unsplash.com/photo-1572635196184-84e35138cf62?fit=crop&w=1280&h=720",
                    "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/655257f193ac0b8fd31629ad.jpeg",
                    "uid": "655257f193ac0b8fd31629ad",
                    "type": "image/jpeg",
                    "name": "655257f193ac0b8fd31629ad.jpeg",
                    "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/655257f193ac0b8fd31629ad.jpeg?sv=2023-08-03&st=2023-11-13T17%3A08%3A01Z&se=2024-02-11T17%3A08%3A01Z&sr=c&sp=r&sig=lbf9Ty%2B37KRs7eAzROQpn1jYzLraZ9zx3a8hj2OuUdY%3D",
                    "thumbnailUrl": ""
                },
                {
                    "_id": "6552580393ac0b49861629b3",
                    "originalUrl": "https://images.unsplash.com/photo-1584641911870-6196a92c1920?fit=crop&w=1280&h=720",
                    "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/655257f193ac0b15a01629ac.jpeg",
                    "uid": "655257f193ac0b15a01629ac",
                    "type": "image/jpeg",
                    "name": "655257f193ac0b15a01629ac.jpeg",
                    "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/655257f193ac0b15a01629ac.jpeg?sv=2023-08-03&st=2023-11-13T17%3A08%3A01Z&se=2024-02-11T17%3A08%3A01Z&sr=c&sp=r&sig=lbf9Ty%2B37KRs7eAzROQpn1jYzLraZ9zx3a8hj2OuUdY%3D",
                    "thumbnailUrl": ""
                }
            ],
            "signatureImage": {
                "_id": "6552580393ac0b09111629b4",
                "originalUrl": "https://images.unsplash.com/photo-1522100077728-4fae00f560c8?fit=crop&w=1280&h=720",
                "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/655257f193ac0b7bd61629af.jpeg",
                "uid": "655257f193ac0b7bd61629af",
                "type": "image/jpeg",
                "name": "655257f193ac0b7bd61629af.jpeg",
                "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/655257f193ac0b7bd61629af.jpeg?sv=2023-08-03&st=2023-11-13T17%3A08%3A02Z&se=2024-02-11T17%3A08%3A02Z&sr=c&sp=r&sig=ZzNTgWaQ9mU25koX3ytMzahHkTfHjXkEOnEol6LSIi4%3D",
                "thumbnailUrl": ""
            },
            "reportedAt": "2023-11-13T17:08:02.004Z",
            "locationCoordinate": {
                "coordinates": [
                    16.7685502,
                    95.991854
                ],
                "type": "Point"
            }
        },
        "dynamic365ContactId": "5bf5d524-4782-ee11-8179-000d3a85e8c0",
        "dynamic365ClaimCaseId": "f378ab31-4782-ee11-8179-000d3a85e8c0",
        "dynamic365ClaimCaseNo": "AYA-CL-23000527",
        "dynamic365ClaimType": "Non-Motor",
        "dynamic365ClaimProductType": "Health Insurance",
        "createdAt": "2023-11-13T17:08:19.752Z",
        "updatedAt": "2023-11-13T17:08:19.752Z",
        "no": 1188,
        "__v": 0
    }
}

*/
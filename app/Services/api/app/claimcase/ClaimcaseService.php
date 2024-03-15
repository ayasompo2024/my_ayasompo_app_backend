<?php
namespace App\Services\api\app\claimcase;

use App\Traits\UploadFileToAzurBlobStorage;
use Log;

class ClaimcaseService
{
    use UploadFileToAzurBlobStorage, PrepareData, CallAPI, StoreClaimCase;

    function motorCase($request)
    {
        $input = $this->prepareDataForMotorClaimAPI($request);

        $accidentDamagedPhotos = $this->uploadPhotoToAzure($request->accident_damaged_photos);
        $signatureImage = $this->uploadPhotoToAzure($request->signature_image, false);
        if (empty($accidentDamagedPhotos) || empty($signatureImage))
            return 1;

        $input["signature_image"] = $signatureImage[0]["url"];
        $urlArry = collect($accidentDamagedPhotos)->pluck('url')->toArray();
        $input["accident_damaged_photos"] = $urlArry;

        $createMotorClaimCase = $this->CallMotorCaseAPI($input);
        if (!$createMotorClaimCase)
            return 2;

        $dataForMotorStore = $this->prepareDataStoreMotorCase($request);
        $dataForMotorStore["signature_image"] = $signatureImage[0]["url"];
        $dataForMotorStore["accident_damaged_photos"] = serialize($urlArry);

        $status = $this->storeMotorCase($dataForMotorStore);
        return $status ? ['id' => $status->id] : false;
    }

    function nonMotorCase($request)
    {
        $accidentDamagedPhotos = $this->uploadPhotoToAzure($request->accident_damaged_photos);
        $signatureImage = $this->uploadPhotoToAzure($request->signature_image, false);
        if (empty($accidentDamagedPhotos) || empty($signatureImage))
            return 1;

        $input = $this->prepareDataForNonMotorClaimAPI($request, collect($accidentDamagedPhotos)->pluck('url')->toArray(), $signatureImage[0]["url"]);

        $createNonMotorClaimCase = $this->CallNonMotorCaseAPI($input);
        if (!$createNonMotorClaimCase)
            return 2;

        $input["accident_damaged_photos"] = serialize(collect($accidentDamagedPhotos)->pluck('url')->toArray());
        $input["app_customer_id"]  = $request->user_id;
        $status = $this->storeNonMotorCase($input);
        return $status ? ['id' => $status->id] : false;
    }
}

// {
//     "success": true,
//     "data": {
//         "crmStatus": "active",
//         "status": "open",
//         "stage": "open",
//         "channel": "App",
//         "dynamic365ClaimIntimationOpened": false,
//         "_id": "659e33de9216cb0019f1e7b8",
//         "customer": "650d5ce67feec05bc1c10ee4",
//         "reporterContact": {
//             "fullname": "U MOE AUNG MAW",
//             "telephone": "09787365517"
//         },
//         "policyNo": "AYA/YGN/MNF/23000002",
//         "accidentReport": {
//             "vehicleNo": "1A/9386(YGN)",
//             "locationCoordinate": {
//                 "coordinates": [
//                     16.7685502,
//                     95.991854
//                 ],
//                 "type": "Point"
//             },
//             "driverName": "U MOE AUNG MAW",
//             "location": "Neverland",
//             "accidentDateTime": "2023-12-30T17:30:00.000Z",
//             "accidentDescription": "My car got hit in while stopping for a while in Neverland.",
//             "accidentDamagedPortion": "Rare Bumper and Front Light",
//             "accidentDamagedPhotos": [
//                 {
//                     "_id": "659e33de9216cb0019f1e7b9",
//                     "originalUrl": "https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?fit=crop&w=1280&h=720",
//                     "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/659e33d89216cb0019f1e7b3.jpeg",
//                     "uid": "659e33d89216cb0019f1e7b3",
//                     "type": "image/jpeg",
//                     "name": "659e33d89216cb0019f1e7b3.jpeg",
//                     "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/659e33d89216cb0019f1e7b3.jpeg?sv=2023-08-03&st=2024-01-10T06%3A06%3A17Z&se=2024-04-09T06%3A06%3A17Z&sr=c&sp=r&sig=qzEE4gaC759lnI2xx9%2BTB9yuhnwjq2K5B%2Fz0YHZ%2B%2Bn0%3D",
//                     "thumbnailUrl": ""
//                 },
//                 {
//                     "_id": "659e33de9216cb0019f1e7ba",
//                     "originalUrl": "https://images.unsplash.com/photo-1572635196184-84e35138cf62?fit=crop&w=1280&h=720",
//                     "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/659e33d99216cb0019f1e7b4.jpeg",
//                     "uid": "659e33d99216cb0019f1e7b4",
//                     "type": "image/jpeg",
//                     "name": "659e33d99216cb0019f1e7b4.jpeg",
//                     "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/659e33d99216cb0019f1e7b4.jpeg?sv=2023-08-03&st=2024-01-10T06%3A06%3A17Z&se=2024-04-09T06%3A06%3A17Z&sr=c&sp=r&sig=qzEE4gaC759lnI2xx9%2BTB9yuhnwjq2K5B%2Fz0YHZ%2B%2Bn0%3D",
//                     "thumbnailUrl": ""
//                 },
//                 {
//                     "_id": "659e33de9216cb0019f1e7bb",
//                     "originalUrl": "https://images.unsplash.com/photo-1584641911870-6196a92c1920?fit=crop&w=1280&h=720",
//                     "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/659e33d89216cb0019f1e7b2.jpeg",
//                     "uid": "659e33d89216cb0019f1e7b2",
//                     "type": "image/jpeg",
//                     "name": "659e33d89216cb0019f1e7b2.jpeg",
//                     "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/659e33d89216cb0019f1e7b2.jpeg?sv=2023-08-03&st=2024-01-10T06%3A06%3A16Z&se=2024-04-09T06%3A06%3A16Z&sr=c&sp=r&sig=OTfBt34e9DO8VEzg3cXe%2BhaI701dXdAo7eb7I2j0Ymw%3D",
//                     "thumbnailUrl": ""
//                 }
//             ],
//             "signatureImage": {
//                 "_id": "659e33de9216cb0019f1e7bc",
//                 "originalUrl": "https://images.unsplash.com/photo-1522100077728-4fae00f560c8?fit=crop&w=1280&h=720",
//                 "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/659e33da9216cb0019f1e7b5.jpeg",
//                 "uid": "659e33da9216cb0019f1e7b5",
//                 "type": "image/jpeg",
//                 "name": "659e33da9216cb0019f1e7b5.jpeg",
//                 "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/659e33da9216cb0019f1e7b5.jpeg?sv=2023-08-03&st=2024-01-10T06%3A06%3A18Z&se=2024-04-09T06%3A06%3A18Z&sr=c&sp=r&sig=9Qsud%2BBA96kXIy%2FaHarRpNCy6yuhMIjnirX4QhDMyy4%3D",
//                 "thumbnailUrl": ""
//             },
//             "reportedAt": "2024-01-10T06:06:18.560Z",
//             "medicalRecords": []
//         },
//         "dynamic365ContactId": "6e0b7f0b-2559-ee11-be6f-002248ecf212",
//         "dynamic365ClaimCaseId": "6727da5b-7eaf-ee11-a569-000d3a85e8c0",
//         "dynamic365ClaimCaseNo": "AYA-CL-24000005",
//         "dynamic365ClaimType": "Motor",
//         "createdAt": "2024-01-10T06:06:22.170Z",
//         "updatedAt": "2024-01-10T06:06:22.170Z",
//         "no": 1297,
//         "__v": 0
//     }
// }
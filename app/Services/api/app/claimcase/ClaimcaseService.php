<?php
namespace App\Services\api\app\claimcase;

use App\Traits\UploadFileToAzurBlobStorage;

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
//         "_id": "65938e9e8ca2660012d91ea5",
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
//                     "_id": "65938e9e8ca2660012d91ea6",
//                     "originalUrl": "https://images.unsplash.com/photo-1581235720704-06d3acfcb36f?fit=crop&w=1280&h=720",
//                     "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/65938e958ca2660012d91e9f.jpeg",
//                     "uid": "65938e958ca2660012d91e9f",
//                     "type": "image/jpeg",
//                     "name": "65938e958ca2660012d91e9f.jpeg",
//                     "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/65938e958ca2660012d91e9f.jpeg?sv=2023-08-03&st=2024-01-02T04%3A18%3A29Z&se=2024-04-01T04%3A18%3A29Z&sr=c&sp=r&sig=Y9x18f6rxE7o5sJWOphxNHaAV1XzivpNHtO0Gx3P%2FwE%3D",
//                     "thumbnailUrl": ""
//                 },
//                 {
//                     "_id": "65938e9e8ca2660012d91ea7",
//                     "originalUrl": "https://images.unsplash.com/photo-1572635196184-84e35138cf62?fit=crop&w=1280&h=720",
//                     "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/65938e958ca2660012d91ea0.jpeg",
//                     "uid": "65938e958ca2660012d91ea0",
//                     "type": "image/jpeg",
//                     "name": "65938e958ca2660012d91ea0.jpeg",
//                     "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/65938e958ca2660012d91ea0.jpeg?sv=2023-08-03&st=2024-01-02T04%3A18%3A30Z&se=2024-04-01T04%3A18%3A30Z&sr=c&sp=r&sig=VbAOEfHFMA1U0nWfvlHjyBJmU%2Fx8KztjQsxUthGnhO0%3D",
//                     "thumbnailUrl": ""
//                 },
//                 {
//                     "_id": "65938e9e8ca2660012d91ea8",
//                     "originalUrl": "https://images.unsplash.com/photo-1584641911870-6196a92c1920?fit=crop&w=1280&h=720",
//                     "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/65938e958ca2660012d91ea1.jpeg",
//                     "uid": "65938e958ca2660012d91ea1",
//                     "type": "image/jpeg",
//                     "name": "65938e958ca2660012d91ea1.jpeg",
//                     "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/65938e958ca2660012d91ea1.jpeg?sv=2023-08-03&st=2024-01-02T04%3A18%3A29Z&se=2024-04-01T04%3A18%3A29Z&sr=c&sp=r&sig=Y9x18f6rxE7o5sJWOphxNHaAV1XzivpNHtO0Gx3P%2FwE%3D",
//                     "thumbnailUrl": ""
//                 }
//             ],
//             "signatureImage": {
//                 "_id": "65938e9e8ca2660012d91ea9",
//                 "originalUrl": "https://images.unsplash.com/photo-1522100077728-4fae00f560c8?fit=crop&w=1280&h=720",
//                 "azureUrl": "https://expa-ai-claim-management-staging.blob.core.windows.net/temps/65938e968ca2660012d91ea3.jpeg",
//                 "uid": "65938e968ca2660012d91ea3",
//                 "type": "image/jpeg",
//                 "name": "65938e968ca2660012d91ea3.jpeg",
//                 "url": "https://ayasompostorage01.blob.core.windows.net/expa-ai-claim-management-staging/temps/65938e968ca2660012d91ea3.jpeg?sv=2023-08-03&st=2024-01-02T04%3A18%3A31Z&se=2024-04-01T04%3A18%3A31Z&sr=c&sp=r&sig=qYvecSkC%2BibiXn5l3PnURsnxsuRJXITfVJGCInKz6mw%3D",
//                 "thumbnailUrl": ""
//             },
//             "reportedAt": "2024-01-02T04:18:31.046Z",
//             "medicalRecords": []
//         },
//         "dynamic365ContactId": "6e0b7f0b-2559-ee11-be6f-002248ecf212",
//         "dynamic365ClaimCaseId": "b6a1fffa-25a9-ee11-be37-6045bd57c806",
//         "dynamic365ClaimCaseNo": "AYA-CL-24000002",
//         "dynamic365ClaimType": "Motor",
//         "createdAt": "2024-01-02T04:18:38.128Z",
//         "updatedAt": "2024-01-02T04:18:38.128Z",
//         "no": 1294,
//         "__v": 0
//     }
// }
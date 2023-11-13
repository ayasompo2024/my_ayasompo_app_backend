<?php
namespace App\Services\api\app\claimcase;

use App\Models\RequestForm;
use App\Repositories\LogRepository;
use App\Repositories\ProductCodeListRequestFormTypeRepo;
use App\Traits\UploadFileToAzurBlobStorage;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use GuzzleHttp\Client;
use League\OAuth1\Client\Credentials\TokenCredentials;
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
        $status = $this->storeNonMotorCase($input);
        return $status ? ['id' => $status->id] : false;
    }
}


// "_id": "6551e30b93ac0b0c98162479",
// "dynamic365ContactId": "6e0b7f0b-2559-ee11-be6f-002248ecf212",
// "dynamic365ClaimCaseId": "bf954882-0182-ee11-8179-000d3a85e8c0",
// "dynamic365ClaimCaseNo": "AYA-CL-23000494",
// "no": 1155,






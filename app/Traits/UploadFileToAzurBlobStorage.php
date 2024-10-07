<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait UploadFileToAzurBlobStorage
{
    public function uploadPhotoToAzure($files, $is_array = true)
    {
        $client = new Client;
        try {
            $result = [];
            if ($is_array) {
                foreach ($files as $file) {
                    $json = $this->realUpload($client, $file);
                    if (count($json['data']['files']) > 0) {
                        foreach ($json['data']['files'] as $file) {
                            array_push($result, $file);
                        }
                    }
                }
            } else {
                $json = $this->realUpload($client, $files);
                if (count($json['data']['files']) > 0) {
                    foreach ($json['data']['files'] as $file) {
                        array_push($result, $file);
                    }
                }
            }

            return $result;

        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function realUpload($httpClient, $file)
    {
        $upload_file_url = config('app.FILE_UPLOAD_BASE_URL').'api/external/files';

        $response = $httpClient->post($upload_file_url, [
            'multipart' => [
                [
                    'name' => 'files',
                    'contents' => file_get_contents($file->getRealPath()),
                    'filename' => $file->getClientOriginalName(),
                ],
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}

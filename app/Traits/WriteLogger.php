<?php

namespace App\Traits;
use Log;

trait WriteLogger
{
    function writeLog($channel, $key, $data, $delete = true)
    {
        if (config("app.WRITE_LOG") && in_array($channel, ['login', 'registerdata'])) {
            if (is_array($data)) {
                $data = array_filter($data, function ($value, $dataKey) {
                    return stripos($dataKey, 'password') === false;
                }, ARRAY_FILTER_USE_BOTH);
            }

            if ($delete) {
                $logFilePath = storage_path("logs/{$channel}.log");
                if (file_exists($logFilePath)) {
                    unlink($logFilePath);
                }
            }

            $logData = ['key' => $key, 'data' => $data];
            Log::channel($channel)->info($logData);
        }
    }
}
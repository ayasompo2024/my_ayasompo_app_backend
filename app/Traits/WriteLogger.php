<?php

namespace App\Traits;

use Log;

trait WriteLogger
{
    function writeLog($channel, $key, $data, $delete = true)
    {
        if (config("app.WRITE_LOG")) {
            if ($delete) {
                $logFilePath = storage_path("logs/{$channel}.log");
                if (file_exists($logFilePath)) {
                    unlink($logFilePath);
                }
            }
            $data = ['key' => $key, "data" => $data];
            Log::channel($channel)->info($data);
        }
    }
}
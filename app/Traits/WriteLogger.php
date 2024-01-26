<?php

namespace App\Traits;

use Log;

trait WriteLogger
{
    function writeLog($channel, $key, $data)
    {
        if (config("app.WRITE_LOG")) {
            $data = ['key' => $key, "data" => $data];
            Log::channel($channel)->info($data);
        }
    }
}
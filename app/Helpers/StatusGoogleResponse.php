<?php

namespace App\Helpers;

class StatusGoogleResponse
{
    public static function undefinedStatus(array $response)
    {
        foreach (config('services.response_codes') as $key => $status) {
            if($response['status'] === $key) {
                !array_key_exists('error_message', $response) ?: $status = $response['error_message'];
                return $status;
            }
        }
    }
}

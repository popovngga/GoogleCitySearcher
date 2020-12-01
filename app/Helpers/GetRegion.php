<?php


namespace App\Helpers;


use App\Models\Region;

class GetRegion
{
    public static function region(array $response)
    {
        foreach ($response['results'] as $result) {
            if(in_array('country', $result['types'])) {
                return Region::updateOrCreate([
                    'name' => $result['formatted_address']
                ]);
            }
        }
        return [];
    }
}

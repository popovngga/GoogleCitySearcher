<?php


namespace App\Helpers;


use App\Models\City;

class GetCity
{
    public static function city(array $response)
    {
        $current_city_entity = null;
        $city_value = null;
        $type = null;
        foreach ($response['results'] as $result) {
            foreach (config('services.priority') as $key => $priority) {
                if(in_array($key, $result['types']) && $current_city_entity < $priority) {
                    $current_city_entity = $priority;
                    $city_value = current($result['types']);
                    $type = $result;
                }
            }
        }
        foreach ($type['address_components'] as $city) {
            if(in_array($city_value, $city['types'])) {
                return City::updateOrCreate([
                    'name' => $city['long_name']
                ]);
            }
        }
        return [];
    }
}

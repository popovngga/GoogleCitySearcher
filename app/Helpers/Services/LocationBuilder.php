<?php

namespace App\Helpers\Services;

use App\Helpers\GetCity;
use App\Helpers\GetRegion;
use App\Helpers\StatusGoogleResponse;
use App\Models\Location;
use Illuminate\Support\Facades\Http;

class LocationBuilder implements LocationServiceInterface
{
    public function build(array $response, array $attributes): Location
    {
        $region = GetRegion::region($response);
        $city   = GetCity::city($response);
        return Location::create([
            'longitude' => $attributes['longitude'],
            'latitude'  => $attributes['latitude'],
            'city_id'   => $city->id ?? '',
            'region_id' => $region->id ?? '',
        ]);
    }

    public function searchAtDatabase(array $attributes): ?string
    {
        $location = Location::where('longitude', $attributes['longitude'])
            ->where('latitude', $attributes['latitude'])
            ->first();
        if($location) {
            return $location->address;
        }
        return $location;
    }

    public function searchAtGoogle(array $attributes)
    {
        $response = Http::post(config('services.google_base_url')
            . 'maps/api/geocode/json?latlng='
            . $attributes['latitude'] . ',' . $attributes['longitude']
            . '&key='. config('services.google_key')
            . '&language=ru')->json();

        if($response['status'] === 'OK') {
            return $this->build($response, $attributes)->address;
        } elseif (array_key_exists('status', $response)) {
            return StatusGoogleResponse::undefinedStatus($response);
        }
        return 'Something went wrong';
    }
}

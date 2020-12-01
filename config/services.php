<?php

return [
    'google_key' => env('GOOGLE_TOKEN'),
    'google_base_url' => env('GOOGLE_BASE_URL', 'https://maps.googleapis.com/'),
    'response_codes' => [
        'ZERO_RESULTS' => 'Nothing was found.',
        'OVER_DAILY_LIMIT' => 'The API key is missing or invalid.'
            . 'Billing has not been enabled on your account.'
            . 'A self-imposed usage cap has been exceeded.'
            . 'The provided method of payment is no longer '
            . 'valid (for example, a credit card has expired).',
        'OVER_QUERY_LIMIT' => 'You are over your quota.',
        'REQUEST_DENIED' => 'Your request was denied.',
        'INVALID_REQUEST' => 'The query (address, components or latlng) is missing.',
        'UNKNOWN_ERROR' => 'The request could not be processed due to a server error. '
            . 'The request may succeed if you try again.',
    ],
    'priority' => [
        'locality' => 20,
        'administrative_area_level_5' => 19,
        'administrative_area_level_4' => 19,
        'administrative_area_level_3' => 17,
        'administrative_area_level_2' => 16,
        'administrative_area_level_1' => 15,
        'colloquial_area' => 14,
        'sublocality' => 13,
        'neighborhood' => 12,
        'premise' => 11,
        'subpremise' => 10,
        'street_address' => 9,
        'route' => 8,
        'natural_feature' => 7,
        'airport' => 6,
        'park' => 5,
        'point_of_interest' => 4,
        'intersection' => 3,
        'postal_code' => 2,
        'plus_code' => 1,
    ],
];

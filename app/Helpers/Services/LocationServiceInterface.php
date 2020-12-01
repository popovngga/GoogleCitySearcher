<?php

namespace App\Helpers\Services;

use App\Models\Location;

interface LocationServiceInterface
{
    public function build(array $response, array $attributes): Location;
    public function searchAtDatabase(array $attributes): ?string;
    public function searchAtGoogle(array $attributes);
}

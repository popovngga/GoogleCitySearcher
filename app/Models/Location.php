<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    protected $guarded = [];

    public function city(): belongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function region(): belongsTo
    {
        return $this->belongsTo(Region::class);
    }
}

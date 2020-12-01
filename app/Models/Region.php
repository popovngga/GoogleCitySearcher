<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Region extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function location(): hasOne
    {
        return $this->hasOne(Location::class);
    }
}

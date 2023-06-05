<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Role extends Model
{
    protected $guarded=[];


    public function roleable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getPermissionsAttribute($permission)
    {
        return json_decode($permission);
    }
}

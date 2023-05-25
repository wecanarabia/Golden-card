<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $guarded = [];



    public function area()
    {
        return $this->belongsTo(Area::class);
    }

     public function service()
    {
        return $this->belongsTo(Service::class);
    }

}

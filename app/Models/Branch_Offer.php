<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch_Offer extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }



    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}

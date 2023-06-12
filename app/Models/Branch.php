<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory,HasTranslations;

    protected $guarded = [];
    public $translatable = ['name'];



    public function area()
    {
        return $this->belongsTo(Area::class);
    }

     public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function offers(){

        return $this->belongsToMany(Offer::class,'branch__offers','branch_id','offer_id');
    }

}

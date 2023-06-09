<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];


    public function offers(){

        return $this->belongsToMany(Offer::class,'offer_tags','tag_id','offer_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory,HasTranslations;

    protected $guarded = [];
    public $translatable = ['name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($branch) {
            $branch->slug = Str::slug($branch->name);
        });

        static::updating(function ($branch) {
            $branch->slug = Str::slug($branch->name);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

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

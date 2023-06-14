<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded = [];
    public $translatable = ['name','description'];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(base_path('../img/offer/'), $filename);
            $this->attributes['image'] =  'img/offer/'.$filename;
        }
    }
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($offer) {
            $offer->slug = Str::slug($offer->name);
        });

        static::updating(function ($offer) {
            $offer->slug = Str::slug($offer->name);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::deleted(function ($offer) {
            if($offer->vouchers) $offer->vouchers()->delete();
            if ($offer->image  && \Illuminate\Support\Facades\File::exists($offer->image)) {
                unlink($offer->image);
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function branches(){

        return $this->belongsToMany(Branch::class,'branch__offers','offer_id','branch_id');
    }

    public function tags(){

        return $this->belongsToMany(Tag::class,'offer_tags','offer_id','tag_id');
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }



}


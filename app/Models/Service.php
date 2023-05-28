<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded = [];
    public $translatable = ['name','description'];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/service_logo/'), $filename);
            $this->attributes['image'] =  'img/service_logo/'.$filename;
        }
    }

    protected static function booted()
    {
        static::deleted(function ($service) {
            if ($service->image  && \Illuminate\Support\Facades\File::exists($service->image)) {
                unlink($service->image);
            }
        });
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function images()
    {
        return $this->hasMany(ImageService::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageService extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/service_imgs/'), $filename);
            $this->attributes['image'] =  'img/service_imgs/'.$filename;
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

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }
}

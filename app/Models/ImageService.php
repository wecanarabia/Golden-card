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
            $file->move(public_path('img/cats/'), $filename);
            $this->attributes['image'] =  'img/cats/'.$filename;
        }
    }

    protected static function booted()
    {
        static::deleted(function ($category) {
            if ($category->image  && \Illuminate\Support\Facades\File::exists($category->image)) {
                unlink($category->image);
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }
}

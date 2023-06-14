<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(base_path('../img/slider/'), $filename);
            $this->attributes['image'] =  'img/slider/'.$filename;
        }
    }
    protected static function booted()
    {
        static::deleted(function ($slider) {
            if ($slider->image  && \Illuminate\Support\Facades\File::exists($slider->image)) {
                unlink($slider->image);
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

}

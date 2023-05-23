<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Introduction extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded=[];
    public $translatable = ['title','body'];

    public function setImageAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(public_path('img/introduction/'), $filename);
            $this->attributes['image'] =  'img/introduction/'.$filename;
        }
    }
}

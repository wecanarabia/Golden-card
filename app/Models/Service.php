<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory,HasTranslations;
    protected $guarded = [];
    public $translatable = ['body'];

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

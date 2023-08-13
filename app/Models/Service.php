<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Service extends Authenticatable
{
    use HasFactory,HasTranslations;
    protected $guarded = [];
    public $translatable = ['name','description'];
    protected $hidden =['password'];

    public function setLogoAttribute($value){
        if ($value){
            $file = $value;
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().mt_rand(1000,9999).'.'.$extension;
            $file->move(base_path('../img/service_logo/'), $filename);
            $this->attributes['logo'] =  'img/service_logo/'.$filename;
        }
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $service->slug = Str::slug($service->name);
        });

        static::updating(function ($service) {
            $service->slug = Str::slug($service->name);
        });
    }

    protected static function booted()
    {
        static::deleted(function ($service) {
            if($service->branches) $service->branches()->delete();
            if ($service->subcategories()->count()>0)$service->subcategories()->detach();
            foreach ($service->images as $image) {
                if ($image->image  && \Illuminate\Support\Facades\File::exists($image->image)) {
                    unlink($image->image);
                }
            }
            if($service->images) $service->images()->delete();
            foreach ($service->offers as $offer) {
                if($offer->vouchers) $offer->vouchers()->delete();
            }
            if($service->offers) $service->offers()->delete();

            if ($service->logo  && \Illuminate\Support\Facades\File::exists($service->logo)) {
                unlink($service->logo);
            }
        });
    }

    public function subcategories(){

        return $this->belongsToMany(Subcategory::class,'service_subcategories','service_id','subcategory_id');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }

    public function images()
    {
        return $this->hasMany(ImageService::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function role(): MorphMany
    {
        return $this->MorphMany(Role::class, 'roleable');
    }


    public function serviceRole()
    {
        return $this->belongsTo(Role::class,'role_id');//one to one
    }

    public function hasAbility($permissions)//get permission from provider & check it
    {
        $role=$this->serviceRole;//get & check relation
        if(!$role){
            return false;
        }
        foreach ($role->permissions as $permission)
        {
            if(is_array($permissions) && in_array($permission,$permissions)){
                return true;
            }elseif (is_string($permissions) && strcmp($permissions,$permission) == 0){
                return true;
            }
        }
        return false;
    }

}

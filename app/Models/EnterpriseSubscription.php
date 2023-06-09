<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterpriseSubscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function copones()
    {
        return $this->hasMany(EnterpriseCopone::class,'enterprise_subscription_id');
    }


    protected static function booted()
    {
        static::deleted(function ($enterprise) {
            if($enterprise->copones) $enterprise->copones()->delete();
        });
    }

}

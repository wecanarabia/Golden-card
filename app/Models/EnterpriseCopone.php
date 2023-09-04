<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnterpriseCopone extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enterpriseSubscription()
    {
        return $this->belongsTo(EnterpriseSubscription::class,'enterprise_subscription_id');
    }

    public function subscription(): MorphOne
    {
        return $this->morphOne(Subscription::class, 'subable');
    }
}

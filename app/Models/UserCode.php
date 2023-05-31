<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCode extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function promo_code()
    {
        return $this->belongsTo(PromoCode::class);
    }

    public function subscription()
    {
        return $this->belongsTo(subscription::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferTag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}

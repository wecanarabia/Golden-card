<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'code',
        'password',
        'lat',
        'long',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class)->orderBy('id','desc');
    }
    public function offers(){

        return $this->belongsToMany(Offer::class,'vouchers','user_id','offer_id');
    }


    public function paginationoffers(){

        return $this->belongsToMany(Offer::class,'vouchers','user_id','offer_id')->paginate(10);
    }

    public function vouchers(){

        return $this->hasMany(Voucher::class);
    }

    public function paginationvouchers(){

        return $this->hasMany(Voucher::class)->paginate(10);
    }

    public function notifications(){

        return $this->hasMany(Notification::class);
    }

    public function favorites(){
        return $this->belongsToMany(Offer::class,'favorites','user_id','offer_id')->paginate(10);
    }

    public function enterprise_copne()
    {
        return $this->hasOne(EnterpriseCopone::class);
    }

    public function enterprise_copnes()
    {
        return $this->hasMany(EnterpriseCopone::class);
    }

    protected static function booted()
    {
        static::deleted(function ($user) {
            if($user->enterprise_copnes) $user->enterprise_copnes()->delete();
            if($user->notifications) $user->notifications()->delete();
            if($user->vouchers) $user->vouchers()->delete();
            if($user->subscriptions) $user->subscriptions()->delete();
            if($user->offers()->count()>0) $user->offers()->detach();

        });
    }

}

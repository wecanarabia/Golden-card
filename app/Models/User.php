<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    protected $appends = ['save_val'];

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

        return $this->belongsToMany(Offer::class,'vouchers','user_id','offer_id')->orderBy('id', 'desc')->paginate(10);
    }

    public function vouchers(){

        return $this->hasMany(Voucher::class);
    }

    public function paginationvouchers(){

        return $this->hasMany(Voucher::class)->orderBy('id', 'desc')->paginate(10);
    }

    // public function notifications(){

    //     return $this->hasMany(Notification::class);
    // }

    public function favorites(){
        return $this->belongsToMany(Offer::class,'favorites','user_id','offer_id')->orderBy('id', 'desc')->paginate(10);
    }

    public function favcount(){
        return $this->belongsToMany(Offer::class,'favorites','user_id','offer_id');
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

            // if($user->notifications) $user->notifications()->delete();
            if($user->vouchers) $user->vouchers()->delete();
            if($user->subscriptions) $user->subscriptions()->delete();
            if($user->offers()->count()>0) $user->offers()->detach();

        });
    }

    public function saveVal(): Attribute
    {
        $total=0;
        if (!empty($this->vouchers)) {

                foreach($this->vouchers as $voucher){
                    $total+=$voucher->offer->discount_value;
                }
                return Attribute::make(
                    get: fn (int|null $value) =>$total,
                );
            }else{
                return Attribute::make(
                    get: fn (int|null $value) =>$total,
                );
            }
    }

}

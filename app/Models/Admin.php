<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable =['name','email','password'];
    protected $hidden =['password'];

    public function role(): MorphOne
    {
        return $this->morphOne(Role::class, 'roleable')->where('roleable_id',0);
    }

    public function adminRole()
    {
        return $this->belongsTo(Role::class,'role_id');//one to one
    }

    public function hasAbility($permissions)//get permission from provider & check it
    {
        $role=$this->adminRole;//get & check relation
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

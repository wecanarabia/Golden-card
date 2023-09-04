<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ServiceAdmin extends Authenticatable
{
    use HasFactory;
    protected $fillable =['name','email','password','service_id','role_id'];
    protected $hidden =['password'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');//one to one
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

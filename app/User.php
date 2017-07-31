<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Stripe\Order;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password','admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token'
    ];

    public function roles() {

        return $this->belongsToMany('App\Role','user_role','user_id','role_id');
    }

    public function products() {

        return $this->hasMany('App\Product');
    }

    public function hasAnyRole($roles)
    {
        if(is_array($roles)) {

            foreach ($roles as $role) {
                if($this->hasRole($role)) {

                    return true;
                }
            }
        }else {
                if ($this->hasRole($roles)) {
                    return true;
                }
            }
            return false;
        }
        public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first()) {

            return true;
        }
             return false;

    }
        public function isAdmin()
        {
            return $this->admin;
        }

        public  function address()
        {
            return $this->hasMany(Address::class);
        }

        public function orders()
        {
            return $this->hasMany('App\Orders');
        }

}

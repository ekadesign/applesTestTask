<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function getApplesCount() {
        return $this->apples()->count();
    }


    /**
     * @param Apple $apple
     */
    public function takeApple($apple) {

    }

    public function apples(){
        return $this->hasMany('App\Apple', 'grabbed_by');
    }

}

<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'producer_name', 'name', 'introduction', 'image', 'address', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products(): HasMany
    {
        return $this->hasMany('App\Product');
    }

    public function updateUserFindById($user)
    {
        return $this->where([
            'producer_name' => $user['producer_name']
        ])->update([
            'producer_name' => $user['producer_name'],
            'name' => $user['name'],
            'introduction' => $user['introduction'],
            'address' => $user['address'],
            'email' => $user['email'],
            'password' => $user['password'],
            'introduction_image' => $user['introduction_image'],
        ]);
    }
}

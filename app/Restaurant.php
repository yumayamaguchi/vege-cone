<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_name', 'name', 'email', 'password', 'introduction', 'image', 'address',
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

    //バリデーション
    public static $editRules = array(
        'restaurant_name' => ['required', 'string', 'max:255'],
        'name' => ['required', 'string',  'max:255'],
        'introduction' => ['required', 'string', 'max:500'],
        'image' => ['file', 'image'],
        'address' => ['required', 'string'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string', 'min:8',],
    );
}

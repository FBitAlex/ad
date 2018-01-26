<?php

namespace App;

use \Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;


    const IS_BANNED = 1;
    const IS_ACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function add( $fields ) {
        $user = new static;
        $user->fill( $fields );
        $user->self_referal = str_random(8);
        $user->confirm_link = str_random(16);
        if (self::getUserByReferal($fields['referal'])) {
            $user->parent_referal = $fields['referal'];
        }
        $user->save();

        return $user;
    }

    public static function getUserByReferal( $referal ) {
        return self::where('self_referal', $referal)->count();
    }

    public static function getUserByConfirmLink( $conflink ) {
        return self::where('confirm_link', $conflink)->first();
    }

    public static function getCountReferalUser( $conflink ) {
        $user = self::where('confirm_link', $conflink)->first();
        return self::where('parent_referal', $user->self_referal)->count();
    }

}

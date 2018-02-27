<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subs extends Model {
    
    protected $table = 'subscribers';
    
    public static function getList() {
        return self::all();
    }


	public static function add( $fields ) {
		$user = new static;
		$user->name = $fields['name'];
		$user->email = $fields['email'];
		$user->self_referal = str_random(8);
		$user->confirm_link = str_random(16);
		if (self::getUserByReferal($fields['referal'])) {
			$user->parent_referal = $fields['referal'];
		}
		$user->save();
		return $user;
	}

	public static function getUserByReferal( $referal ) {
		return self::where('self_referal', $referal)->first();
	}

	public static function getUserByConfirmLink( $conflink ) {
		return self::where('confirm_link', $conflink)->first();
	}

	public static function getCountReferalUser( $conflink ) {
		$user = self::where('confirm_link', $conflink)->first();
		return self::where('parent_referal', $user->self_referal)->count();
	}

	public static function getCountReferal( $referal ) {
		return self::where('parent_referal', $referal)->count();
	}

}

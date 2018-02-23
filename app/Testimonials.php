<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model {

	protected $table = 'testimonials';

	public static function getList() {
		return self::all();
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model {

   	public static function getList() {
		return self::all();
	}
}

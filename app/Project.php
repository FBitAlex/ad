<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    
	public static function getProjectParams( $slug ) {
		return self::where('slug', $slug)->first();
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
   
    public static function getParamList() {
        return self::all();
    }

    public static function getParamByName( $name ) {
    	return self::where('name', $name);
    }

	public static function getParamByGroup( $group ) {
    	return self::where('group', $group)
    	->orderBy('group', 'ASC')
    	->orderBy('subgroup', 'ASC')
    	->get();
    }

    public static function setParamValue( $value ) {
		$this->value = $fields;
		$this->save();
    }
}

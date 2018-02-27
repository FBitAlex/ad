<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
   
	public $timestamps = false;

	public static function getParamList() {
		return self::all();
	}

	public static function getParamValByName( $name ) {
		$param = self::where('name', $name)->select('value')->get()->toArray();
		return $param[0]['value'];
	}

	public static function getParamByGroup( $group ) {
		return self::where('group', $group)->get();
	}

	public static function getParamByPage( $page ) {
		 $settings = self::where('page', $page)->select('name', 'value')->get()->toArray();
		 foreach ($settings as $seting) {
		 	$result[$seting['name']] = $seting['value'];
		 }
		 return $result;
	}

	public static function setParamValue( $params ) {
	 //dd($params);
		foreach ($params as $key => $val) {
			if ($key == '_token') continue;
			$param = self::where('name',$key)->update(['value' => $val]);
		}
	}

	public static function uploadBackground( $image, $filename ) {
		if ( $image == null ) return;
		$filename = $filename . '.' . $image->extension();
		$image->storeAs( 'img/settings', $filename );
		return $filename;
	}

	public static function setBGValue( $id, $filename ) {
		$param = self::find($id);
		$param->value = $filename;
		return $param->save();
	}

}

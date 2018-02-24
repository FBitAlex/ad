<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model {
   
    public $timestamps = false;

    public static function getParamList() {
        return self::all();
    }

    public static function getParamByName( $name ) {
    	return self::where('name', $name);
    }

	public static function getParamByGroup( $group ) {
    	return self::where('group', $group)
    	->orderBy('group', 'ASC')
    	->orderBy('type', 'ASC')
        //->take(1)
    	->get();
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

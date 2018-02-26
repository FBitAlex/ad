<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model {

	public $timestamps = false;
	protected $table = 'testimonials';
	protected $fillable = ['name', 'position', 'photo', 'content'];

	public static function getList() {
		return self::all();
	}

	public static function getElem( $id ) {
		return self::find($id);
	}

	public static function editItem( $fields ) {
		// dd($fields);
		$item = self::find( $fields['id'] );
		$item->fill($fields);
		$item->save();
	}

	public static function uploadPhoto( $image ) {
		if ( $image == null ) return;
		$filename = str_random(8) . '.' . $image->extension();
		$image->storeAs( 'img/testimonials', $filename );
		return $filename;
	}

	public static function setItemPhoto( $id, $filename ) {
		$param = self::find($id);
		$param->photo = $filename;
		return $param->save();
	}

	public static function addItem( $fields ) {
		$item = new static;
		$item->fill( $fields );
		$item->save();
		return $item;
	}

	public static function deleteItem( $id ) {
		return self::find($id)->delete();
	}

}

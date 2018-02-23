<?php

namespace App\Http\Controllers\Admin;

use App\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller {

	protected $table = 'settings';

	// public static function getParamByGroup( $group ) {
	//     $params = Settings::getParamByGroup( $group );
	//     return view( "admin.settings.".$group, compact('params') );
	// }

	public static function getProjectPage() {
		$params = Settings::getParamByGroup( 'project' );
		return view( "admin.settings.project", compact('params') );
	}

	public static function getDesignPage() {
		$params = Settings::getParamByGroup( 'design' );
		return view( "admin.settings.design", compact('params') );
	}

	public static function getBackgroundPage() {
		$params = Settings::getParamByGroup( 'background' );
		return view( "admin.settings.background", compact('params') );
	}

	public static function getContentPage() {
		$params = Settings::getParamByGroup( 'content' );
		return view( "admin.settings.content", compact('params') );
	}

}

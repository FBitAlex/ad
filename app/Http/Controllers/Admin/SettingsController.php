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

	public function setProject(  Request $request ) {
		Settings::setParamValue( $request->all() );
		return redirect('admin/project');
	}



	public static function getColorPage() {
		$params = Settings::getParamByGroup( 'color' );
		return view( "admin.settings.color", compact('params') );
	}

	public function setColor(  Request $request ) {
		Settings::setParamValue( $request->all() );
		return redirect('admin/color');
	}



	public static function getBackgroundPage() {
		$params = Settings::getParamByGroup( 'background' );
		return view( "admin.settings.background", compact('params') );
	}

	public function setBackground( Request $request ) {
		$filename = Settings::uploadBackground( $request->file('bgimage'), $request->get('filename') );
		Settings::setBGValue( $request->get('id'), $filename );
		return redirect('admin/background');
	}



	public static function getContentPage() {
		$params = Settings::getParamByGroup( 'content' );
		return view( "admin.settings.content", compact('params') );
	}

	public function setContent(  Request $request ) {
		Settings::setParamValue( $request->all() );
		return redirect('admin/content');
	}

}
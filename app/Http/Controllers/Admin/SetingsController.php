<?php

namespace App\Http\Controllers\Admin;

use App\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SetingsController extends Controller {

    protected $table = 'settings';

    public static function getParamByGroup( $group ) {
        $params = Settings::getParamByGroup( $group );
        return view( "admin.settings.".$group, compact('params') );
    }
}

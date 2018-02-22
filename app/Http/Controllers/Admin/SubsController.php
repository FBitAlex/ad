<?php

namespace App\Http\Controllers\Admin;

use App\Subs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubsController extends Controller {
    
    protected $table = 'users';

    public static function getList() {
    	$users =  Subs::getList();
    	return view( 'admin.settings.subs', compact('users') );
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Subs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubsController extends Controller {
    
    protected $table = 'subscribers';

    public static function getList() {
    	$subs =  Subs::getList();
    	return view( 'admin.settings.subs', compact('subs') );
    }
}

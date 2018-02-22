<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Settings;

class DashboardController extends Controller {
    
    public function index()	{
    	$params = Settings::getParamList();
    	return view('admin/dashboard', compact('params'));
    }
}

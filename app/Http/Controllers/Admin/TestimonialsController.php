<?php

namespace App\Http\Controllers\Admin;

use App\Testimonials;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialsController extends Controller {

 	protected $table = 'testimonials';

	public static function getList() {
		$testimonials = Testimonials::getList();
		return view( 'admin.settings.testimonials', compact('testimonials') );
	}
}

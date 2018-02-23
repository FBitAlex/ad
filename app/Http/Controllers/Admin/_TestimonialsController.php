<?php

namespace App\Http\Controllers;

use App\Testimonials;

use Illuminate\Http\Request;

class TestimonialsController extends Controller {

 	protected $table = 'testimonials';

	public static function getList() {
		$testimonials = Testimonials::getListall();
		return view( 'admin.settings.testimonials', compact('testimonials') );
	}
}

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

	public static function getEditPage( $id ) {
		$testimonial = Testimonials::getElem( $id );
		return view( 'admin.settings.testimonial-edit', compact('testimonial') );
	}

	public static function editItem( Request $request ) {
		Testimonials::editItem( $request->all() );
		$filename = Testimonials::uploadPhoto( $request->file('photo') );
		if ($filename) Testimonials::setItemPhoto( $request->get('id'), $filename );
		return redirect('admin/testimonials');
	}


	public static function getAddPage() {
		return view( 'admin.settings.testimonial-add' );
	}

	public static function addItem( Request $request ) {
		$item = Testimonials::addItem( $request->all() );
		//dd($request->file('photo'));
		$filename = Testimonials::uploadPhoto( $request->file('photo') );
		if ($filename) Testimonials::setItemPhoto( $item->id, $filename );
		return redirect('admin/testimonials');
	}


	public static function deleteItem( $id ) {
		Testimonials::deleteItem( $id );
		return redirect('admin/testimonials');
	}

}
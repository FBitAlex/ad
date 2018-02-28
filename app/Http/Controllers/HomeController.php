<?php

namespace App\Http\Controllers;

use App\User;
use App\Subs;
use App\Category;
//use App\Project;
use App\Testimonials;
use App\Settings;

use App\Mail\RegisterMail;
use App\Mail\OpenCourseMail;
use App\Mail\OneMoreReferalMail;

use Illuminate\Http\Request;

class HomeController extends Controller {
	
	public static function index( $referal = null ) {
		$testimonials = Testimonials::getList();
		$settings = Settings::getParamByPage('title');
		//dd($settings);
		$is_reg = 0;
		return view( 'pages.register', compact('home_content', 'home_video', 'referal', 'share_links', 'is_reg', 'testimonials', 'settings') );
	}

	public function register( Request $request ) {
		//dd($request);
		$this->validate($request, [
			'name' 		=> 'required',
			'email' 	=> 'required|email|unique:users',
		]);

		$user = Subs::add($request->all());
		$is_reg = 1;

		// send mail
		\Mail::to($user)->send(new RegisterMail($user));
		// \Notify::success('На вашу почту отправлено письмо с подтверждением. Проверьте почту.');

		// check cnt invited
		$user = Subs::getUserByReferal( $request->referal );
		
		if ( $request->referal != null && $user != null ) {
			
			//$params = Project::getProjectParams( 'astro' );
			$invite_cnt = Settings::getParamValByName( 'invite_cnt' );
			$currentInvited = Subs::getCountReferal( $request->referal );

			if  ( $invite_cnt <= $currentInvited ) { // if enouth, then send letter about open course for download
				if (!$user->is_send) {
					\Mail::to($user)->send(new OpenCourseMail( $user ));
					$user->is_send = 1;
					$user->save();
				}

			} else if (!$user->is_send) { // if not enouth, then send letter about one more frend invite
				\Mail::to($user)->send(new OneMoreReferalMail( $currentInvited,  $invite_cnt ));
			}
		}

		$settings = Settings::getParamBypage('verify');

		return view( 'pages.verify', [
			'is_reg' 		=> $is_reg,
			'active_step' 	=> "active1",
			'referal' 		=> $request->get('referal'),
			'settings'		=> $settings
		]);
		//return redirect('/'.$request->get('referal'));
		//return redirect()->route('startPage', ['referal' => $request->get('referal')]);
	}

	// public function checkCntInvited( $referal ) {
	// }
	// public function sendConfirmMail( $user ) {
	// 	\Mail::to($user)->send(new RegisterMail($user));
	// 	//return view( 'pages.before_confirm', compact('user') );
	// }

	// public function beforeConfirm(  ) {
	// 	return view('pages.before_confirm');
	// }

	public function sendConfirmMail( $user ) {
		\Mail::to($user)->send(new InviteMail($user));
		//return view( 'pages.before_confirm', compact('user') );
	}

	public function confirmEmailPage( $conflink ) {
		
		if ( $conflink == null ) {
			return redirect('/');
		}

		$user = Subs::getUserByConfirmLink( $conflink );
		$count_invite = Subs::getCountReferalUser( $conflink );

		if ( $count_invite === null ) return redirect('/');

		$invite_cnt = Settings::getParamValByName( 'invite_cnt' );
	
		$share_links = \Share::load('http://www.google/com', 'Курс по астрологии')->services('facebook', 'vk', 'twitter');
		 
		if ( $count_invite < $invite_cnt ) {
			$active_step = "active2";
			$settings = Settings::getParamBypage('confirm');
			return view( 'pages.confirm', compact('user', 'count_invite', 'share_links', 'active_step', 'settings') );
		} else {
			$active_step = "active3";
			$settings = Settings::getParamBypage('course');
			return view( 'pages.course', compact('share_links', 'active_step', 'settings') );
		}
	}
	
	// public function verify() {
	// 	$active_step = "active2";
	// 	$settings = Settings::getParamBypage('verify');
	// 	// return view( 'pages.verify', [
	// 	// 	'email'			=> 'user email',
	// 	// 	'active_step' 	=> "active1",
	// 	// 	'settings'		=> $settings
	// 	// ]);

	// 	return view( 'pages.verify', compact('settings', 'active_step') );
	// }

	// public function confirmEmail( $conflink ) {
	// 	if ( $conflink != null ) {
	// 		$count_invite = Subs::getCountReferalUser( $conflink );
	// 		return view( 'pages.confirm', compact('count_invite', 'conflink') );
	// 	}
	// 	return redirect('/');
	// }

/*
	public function show( $slug ) {
		$post = Post::where(['slug' => $slug])->firstOrFail();
		return view('pages.show', [
			'post' 	=> $post,
		]);
	}

	public function tag( $slug ) {
		$tag = Tag::where(['slug' => 	$slug])->firstOrFail();
		$posts = $tag->posts()->paginate(2);
		return view('pages.list', [
			'posts'	=> $posts
		]);
	}

	public function category( $slug ) {
		$category = Category::where(['slug' => 	$slug])->firstOrFail();
		$posts = $category->posts()->paginate(2);
		return view('pages.list', [
			'posts'	=> $posts
		]);
	}
*/
}

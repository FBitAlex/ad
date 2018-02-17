<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Project;

use App\Mail\RegisterMail;
use App\Mail\OpenCourseMail;
use App\Mail\OneMoreReferalMail;

use Illuminate\Http\Request;

class HomeController extends Controller {
	
	public static function registerForm( $referal = null ) {
		$is_reg = 0;
		return view( 'pages.register', compact('home_content', 'home_video', 'referal', 'share_links', 'is_reg') );
	}

	public function register(Request $request) {
		$this->validate($request, [
			'name' 		=> 'required',
			'email' 	=> 'required|email|unique:users',
		]);

		$user = User::add($request->all());
		$is_reg = 1;

		// send mail
		\Mail::to($user)->send(new RegisterMail($user));
		\Notify::success('На вашу почту отправлено письмо с подтверждением. Проверьте почту.');

		// check cnt invited
		$user = User::getUserByReferal( $request->referal );
		if ( $request->referal != null && $user != null ) { // if enouth, then send letter about open course
			
			$params = Project::getProjectParams( 'astro' );
			$currentInvited = User::getCountReferal( $request->referal );

			if  ( $params->need_cnt_invite <= $currentInvited ) {
				if (!$user->is_send) {
					\Mail::to($user)->send(new OpenCourseMail( $user ));
					$user->is_send = 1;
					$user->save();
				}

			} else if (!$user->is_send) { // if not enouth, then send letter about one more frend invite
				\Mail::to($user)->send(new OneMoreReferalMail( $currentInvited,  $params->need_cnt_invite ));
			}
		}
			
		//return $this->registerForm( $is_reg, $request->get('referal') );
		return view( 'pages.register', [
			'is_reg' 	=> $is_reg,
			'referal' 	=> $request->get('referal') 
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
	
	public function confirmEmailPage( $conflink ) {
		
		if ( $conflink == null ) {
			return redirect('/');	
		}

		$user = User::getUserByConfirmLink( $conflink );
		$count_invite = User::getCountReferalUser( $conflink );
		
		$params = Project::getProjectParams( 'astro' );
		
		$share_links = \Share::load('http://www.google/com', 'Курс астрология')->services('facebook', 'vk', 'twitter');
		
		if ( $count_invite < $params->need_cnt_invite ) {
			return view( 'pages.confirm', compact('user', 'count_invite', 'share_links') );
		} else {
			return view( 'pages.course', compact('params', 'share_links') );
		}
	}
	
	public function verify() {
		return view( 'pages.verify', [
			'email' 	=> 'user email'
		]);
	}

	// public function confirmEmail( $conflink ) {
	// 	if ( $conflink != null ) {
	// 		$count_invite = User::getCountReferalUser( $conflink );
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

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
		$home_content 	= "<h1>home content</h1>";
		$home_video 	= "<h1>home video</h1>";
		return view( 'pages.register', compact('home_content', 'home_video', 'referal') );
	}

	public function register(Request $request) {
		$this->validate($request, [
			'name' 		=> 'required',
			'email' 	=> 'required|email|unique:users',
		]);

		$user = User::add($request->all());

		// send mail
		\Mail::to($user)->send(new RegisterMail($user));
		\Notify::success('На вашу почту отправлено письмо с подтверждением. Проверьте почту.');

		// check cnt invited
		if ( $request->referal != null && User::getUserByReferal( $request->referal ) != null ) { // if enouth, then send letter about open course
			
			$user = User::getUserByReferal( $request->referal );
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
			
		return $this->registerForm( $request->get('referal') );
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

		if ( $count_invite < $params->need_cnt_invite ) {
			return view( 'pages.confirm', compact('user', 'count_invite') );
		} else {
			return view( 'pages.course', compact('params') );
		}
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

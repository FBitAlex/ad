<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Mail\SendMail;
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
		//$this->sendConfirmMail( $user );
		\Mail::to($user)->send(new SendMail($user));
		\Notify::success('На вашу почту отправлено письмо с подтверждением. Проверьте почту.');
		return $this->registerForm( $request->get('referal') );
	}

	// public function sendConfirmMail( $user ) {
	// 	\Mail::to($user)->send(new SendMail($user));
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
		return view( 'pages.confirm', compact('user', 'count_invite') );
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

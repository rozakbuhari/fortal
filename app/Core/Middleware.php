<?php

namespace App\Core;


use Auth;

class Middleware {

	public function __construct() {
		$this->auth_check();
	}

	private function auth_check() {
		if(Auth::authenticated()) {
			header('Location: '. URL . 'auth/login');
		}
	}


}
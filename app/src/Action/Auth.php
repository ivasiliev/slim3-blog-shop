<?php

namespace App\Action;

use App\ORM\DataService;

final class Auth extends DataService {

	protected function __construct() {
		
	}

	public static function Info() {
		$user_session = filter_input(INPUT_COOKIE, '_evtfs');
		return $this->getUserDataBySession($user_session);
	}

	public static function Reg() {
		
	}

	public static function RegOverULogin() {
		
	}

	public static function Login() {
		
	}

	public static function Drop() {
		
	}

}

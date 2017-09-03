<?php

namespace App\Action;

use App\ORM\DataService;

final class Auth extends DataService {

	private $view;
	private $logger;
	
	public function __construct(Twig $view, LoggerInterface $logger) {
		parent::__construct($view, $logger);
		$this->view = $view;
		$this->logger = $logger;
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

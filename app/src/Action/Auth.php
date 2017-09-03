<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\ORM\DataService;
use App\Settings\Settings;

final class Auth extends DataService {

	private $view;
	private $logger;

	public function __construct(Twig $view, LoggerInterface $logger) {
		parent::__construct($view, $logger);
		$this->view = $view;
		$this->logger = $logger;
	}

	public static function info() {
		$user_session = filter_input(INPUT_COOKIE, Settings::SESSIONCOOKIE);
		return parent::getUserDataBySession($user_session);
	}

	public static function reg() {
		
	}

	public static function regOverULogin() {
		
	}

	public static function login() {
		
	}

	public static function logout() {
		setcookie(Settings::SESSIONCOOKIE, "", time() - 1);
	}

	public static function drop() {
		
	}

}

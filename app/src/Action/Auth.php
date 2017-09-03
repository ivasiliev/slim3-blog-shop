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

	public function info() {
		$user_session = filter_input(INPUT_COOKIE, Settings::SESSIONCOOKIE);
		return $this->getUserDataBySession($user_session);
	}

	public function reg() {
		
	}

	public function regOverULogin() {
		
	}

	public function login() {
		
	}

	public function logout() {
		setcookie(Settings::SESSIONCOOKIE, "", time() - 1);
	}

	public function drop() {
		
	}

}

<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\ORM\DataService;

class Auth extends DataService {

	private $view;
	private $logger;
	
	public function __construct(Twig $view, LoggerInterface $logger) {
		parent::__construct($view, $logger);
		$this->view = $view;
		$this->logger = $logger;
	}

	protected static function Info() {
		$user_session = filter_input(INPUT_COOKIE, '_evtfs');
		return $this->getUserDataBySession($user_session);
	}

	protected static function Reg() {
		
	}

	protected static function RegOverULogin() {
		
	}

	protected static function Login() {
		
	}

	protected static function Drop() {
		
	}

}

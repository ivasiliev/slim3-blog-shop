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

	public function login($login, $pass) {
		$user = $this->checkLogin($login, $pass);
		if ($user) {
			$s_id = session_id();
			if (!$s_id) {
				// if session not exists
				return array();
			}
			// create user session
			$u_sessions = $this->getUsersSessions();
			$u_sessions[$s_id] = array(
			    "user_id" => $user["id"],
			    "time_start" => time()
			);
			$this->saveUsersSessions($u_sessions);
			return array(
			    "user" => $user,
			    "session_id" => $s_id
			);
		}
		return array();
	}

	public function checkLogin($login, $pass) {
		$users = $this->getUsersData();
		foreach ($users as $curr) {
			if ($curr["login"] === $login && $curr["pass"] === $pass) {
				return $curr;
			}
		}
		return array();
	}

	public function logout() {
		setcookie(Settings::SESSIONCOOKIE, "", time() - 1);
	}

	public function drop() {
		
	}

}

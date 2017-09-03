<?php

namespace App\ORM;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Settings\Settings;
use App\ORM\BaseDataService;

class DataService extends BaseDataService {

	private $view;
	private $logger;

	public function __construct(Twig $view, LoggerInterface $logger) {
		parent::__construct($view, $logger);
		$this->view = $view;
		$this->logger = $logger;
	}

	public function getUsersData($id = 0) {
		return $this->__getData(Settings::USERS, $id);
	}

	public function getUserDataBySession($session = 0) {
		$sdata = $this->__getData(Settings::USERSESSIONS, $session);
		if ($sdata && count($sdata) > 0) {
			return $this->getUsersData($sdata["user_id"]);
			
		}
		return array();
	}

	public function saveUsersData($data) {
		return $this->__saveDatafile(Settings::CATEGORY, $data);
	}

}

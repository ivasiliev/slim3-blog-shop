<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Action\Imgs;
use App\Action\Auth;

class AdminAction {

	private $view;
	private $logger;
	//private $user;

	public function __construct(Twig $view, LoggerInterface $logger) {
		$this->view = $view;
		$this->logger = $logger;
		$user = new Auth($this->view, $this->logger);
		if (!$user->Info()) {
			header('Location: /login');
			exit;
		}
	}

	public function __invoke(Request $request, Response $response, $args) {
		$this->view->render($response, 'admin/main.twig', array(
		));
		return $response;
	}

}

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
	private $user;
	
	private $test;

	public function __construct(Twig $view, LoggerInterface $logger) {
		$this->view = $view;
		$this->logger = $logger;
		
		$this->user = new Auth($this->view, $this->logger);
		
		$this->test = new AdminAction($view, $logger);
		
		print_r($this->test->user->Info());
	}

	public function __invoke(Request $request, Response $response, $args) {
		$this->view->render($response, 'admin/main.twig', array(
		));
		return $response;
	}

}

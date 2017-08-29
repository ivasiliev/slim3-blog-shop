<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Action\Imgs;

final class HomeAction {

    private $view;
    private $logger;
    private $path;

    public function __construct(Twig $view, LoggerInterface $logger) {
	$this->view = $view;
	$this->logger = $logger;
	$this->path = __DIR__ . "/../../../public/css/photo/";
    }

    public function __invoke(Request $request, Response $response, $args) {
	$this->logger->info("Home page action dispatched");

	$data = json_decode(file_get_contents(__DIR__ . "/json/main.json"), true);

	$this->view->render($response, 'main.twig', array());
	return $response;
    }
}

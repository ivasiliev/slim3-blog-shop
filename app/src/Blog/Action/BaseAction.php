<?php

namespace App\Blog\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Action\Imgs;
use App\Blog\ORM\DataService;

final class BaseAction extends DataService {

        private $view;
        private $logger;
        private $path;

        public function __construct(Twig $view, LoggerInterface $logger) {
                parent::__construct($view, $logger);
                $this->view = $view;
                $this->logger = $logger;
                $this->path = __DIR__ . "/../../../public/css/photo/";
        }
        
        /**
         * Show main blog page
         * @param Request $request
         * @param Response $response
         * @param type $args
         * @return Response - Twig
         */
        public function __invoke(Request $request, Response $response, $args) {
                //$this->logger->info("Home page action dispatched");
                
                $data = json_decode(file_get_contents(__DIR__ . "/json/main.json"), true);
                
                $this->view->render($response, 'main.twig', array());
                return $response;
        }

}

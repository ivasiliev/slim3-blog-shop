<?php

namespace App\Blog\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Action\Imgs;
use App\Blog\ORM\DataService;

final class BaseAction {

        private $view;
        private $logger;
        private $data;

        public function __construct(Twig $view, LoggerInterface $logger) {
                $this->data = new DataService($view, $logger);
                $this->view = $view;
                $this->logger = $logger;
        }
        
        /**
         * Show main blog page
         * @param Request $request
         * @param Response $response
         * @param type $args
         * @return Response - Twig
         */
        public function __invoke(Request $request, Response $response, $args) {
                $this->view->render($response, 'main.twig', array());
                return $response;
        }
        
        public function AdminMainView(Request $request, Response $response, $args) {
                $this->view->render($response, 'admin/blog/main.twig', array());
                return $response;
        }
        
        public function AdminCategoriesView(Request $request, Response $response, $args) {
                $categories = $this->data->getCategoryData();
                $this->view->render($response, 'admin/blog/categories.twig', array(
                    "categories"=>$categories
                ));
                return $response;
        }

}

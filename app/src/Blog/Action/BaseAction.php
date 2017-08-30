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

        public function __construct(Twig $view, LoggerInterface $logger) {
                parent::__construct($view, $logger);
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
                $categories = $this->getCategoryData();
                $this->view->render($response, 'admin/blog/categories.twig', array(
                    "categories"=>$categories
                ));
                return $response;
        }
        
        public function AdminCategoriesForm(Request $request, Response $response, $args) {
                if (isset($args["curr_id"]) && $args["curr_id"] !== ""){
                        $categories = $this->getCategoryData($args["curr_id"]);
                }
                else {
                        $categories = array();
                }
                $this->view->render($response, 'admin/blog/categories_form.twig', array(
                    "data"=>$categories
                ));
                return $response;
        }
        
        public function AdminCategoriesSave(Request $request, Response $response, $args) {
                $params = $request->getParsedBody();
                if (!$params){
                        return $response->withStatus(400, "empty request");
                }
                
                $curr_id = null;
                if (isset($params["curr_id"]) && $params["curr_id"]){
                        $curr_id = $params["curr_id"];
                }
                
                if (!$curr_id){
                        $curr_id = uniqid();
                }
                $elem = array(
                    "id" => $curr_id,
                    "name" => $params["name"],
                    "descr" => $params["descr"],
                );
                
                $list = $this->getCategoryData();
                $list[$curr_id] = $elem;
                
                // save datafile
                print_r($this->saveCategoryData($list));
                exit;
                
                // return rendered data
                return $this->AdminCategoriesView($request, $response, $args);
        }

}

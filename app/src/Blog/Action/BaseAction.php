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

        //----------------------------------------------------------------------
        // categories

        public function AdminCategoriesView(Request $request, Response $response, $args) {
                $categories = $this->getCategoryData();
                $this->view->render($response, 'admin/blog/categories.twig', array(
                    "categories" => $categories
                ));
                return $response;
        }

        public function AdminCategoriesForm(Request $request, Response $response, $args) {
                if (isset($args["curr_id"]) && $args["curr_id"] !== "") {
                        $categories = $this->getCategoryData($args["curr_id"]);
                } else {
                        $categories = array();
                }
                $this->view->render($response, 'admin/blog/categories_form.twig', array(
                    "data" => $categories
                ));
                return $response;
        }

        public function AdminCategoriesSave(Request $request, Response $response, $args) {
                $params = $request->getParsedBody();
                if (!$params) {
                        return $response->withStatus(400, "empty request");
                }

                $curr_id = null;
                if (isset($params["curr_id"]) && $params["curr_id"]) {
                        $curr_id = $params["curr_id"];
                }

                if (!$curr_id) {
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
                $this->saveCategoryData($list);

                // return rendered data
                return $this->AdminCategoriesView($request, $response, $args);
        }

        public function AdminCategoriesDrop(Request $request, Response $response, $args) {
                if (!(isset($args["curr_id"]) && $args["curr_id"] !== "")) {
                        return $response->withStatus(400, "empty request");
                }

                $curr_id = $args["curr_id"];

                $list = $this->getCategoryData();
                if (isset($list[$curr_id])) {
                        // remove current data
                        unset($list[$curr_id]);
                }

                // save datafile
                $this->saveCategoryData($list);

                // return rendered data
                return $this->AdminCategoriesView($request, $response, $args);
        }

        //----------------------------------------------------------------------
        //----------------------------------------------------------------------
        // posts

        public function AdminPostsView(Request $request, Response $response, $args) {
                $list = $this->getPostsData();
                $this->view->render($response, 'admin/blog/posts.twig', array(
                    "list" => $list
                ));
                return $response;
        }

        public function AdminPostsForm(Request $request, Response $response, $args) {
                if (isset($args["curr_id"]) && $args["curr_id"] !== "") {
                        $list = $this->getCategoryData($args["curr_id"]);
                } else {
                        $list = array();
                }
                $this->view->render($response, 'admin/blog/posts_form.twig', array(
                    "data" => $list
                ));
                return $response;
        }

        public function AdminPostsSave(Request $request, Response $response, $args) {
                $params = $request->getParsedBody();
                
                return $response->withJson($params);
                
                if (!$params) {
                        return $response->withStatus(400, "empty request");
                }

                $curr_id = null;
                if (isset($params["curr_id"]) && $params["curr_id"]) {
                        $curr_id = $params["curr_id"];
                }

                if (!$curr_id) {
                        $curr_id = uniqid();
                }
                $elem = array(
                    "id" => $curr_id,
                    "name" => $params["name"],
                    "descr" => $params["descr"],
                );
                
                // here create dir if needed - /posts/year/month/day/post_id/                
                $this->create_dir_if_need($dir);

                $list = $this->getPostsData();
                $list[$curr_id] = $elem;

                // save datafile
                $this->savePostsData($list);

                // return rendered data
                return $this->AdminPostsView($request, $response, $args);
        }

        public function AdminPostsDrop(Request $request, Response $response, $args) {
                if (!(isset($args["curr_id"]) && $args["curr_id"] !== "")) {
                        return $response->withStatus(400, "empty request");
                }

                $curr_id = $args["curr_id"];

                $list = $this->getCategoryData();
                if (isset($list[$curr_id])) {
                        // remove current data
                        unset($list[$curr_id]);
                }

                // save datafile
                $this->saveCategoryData($list);

                // return rendered data
                return $this->AdminPostsView($request, $response, $args);
        }

        //----------------------------------------------------------------------
}

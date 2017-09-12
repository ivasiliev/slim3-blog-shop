<?php

namespace App\Blog\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Action\Imgs;
use App\Blog\ORM\DataService;
use App\Settings\Settings;
use App\Action\Auth;

final class BaseAction extends DataService {

        private $view;
        private $logger;
        private $posts_path;
        private $user;
        private $userdata;

        public function __construct(Twig $view, LoggerInterface $logger) {
                parent::__construct($view, $logger);
                $this->view = $view;
                $this->logger = $logger;
                $this->posts_path = Settings::POSTS_PATH;
                $this->user = new Auth($this->view, $this->logger);
                $this->userdata = $this->user->info();
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
        //----------------------------------------------------------------------

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
        // posts
        //----------------------------------------------------------------------
                
        public function CurrPostPage(Request $request, Response $response, $args) {
                if (isset($args["curr_id"]) && $args["curr_id"] !== "") {
                        $data = $this->getPostsData($args["curr_id"]);
                        $data["main_content"] = file_get_contents($data["path"] . "main_content.html");
                } else {
                        $data = array();
                }
                $this->view->render($response, 'blog/curr_post.twig', array(
                    "data" => $data
                ));
                return $response;
        }

        public function AdminPostsView(Request $request, Response $response, $args) {
                $list = $this->getPostsData();
                $this->view->render($response, 'admin/blog/posts.twig', array(
                    "list" => $list
                ));
                return $response;
        }

        public function AdminPostsForm(Request $request, Response $response, $args) {
                if (isset($args["curr_id"]) && $args["curr_id"] !== "") {
                        $data = $this->getPostsData($args["curr_id"]);
                        $data["main_content"] = file_get_contents($data["path"] . "main_content.html");
                } else {
                        $data = array();
                }
                $this->view->render($response, 'admin/blog/posts_form.twig', array(
                    "data" => $data
                ));
                return $response;
        }

        public function AdminPostsSave(Request $request, Response $response, $args) {
                $params = $request->getParsedBody();
                if (!$params) {
                        return $response->withStatus(400, "empty request");
                }
                if (!$this->userdata) {
                        return $response->withStatus(400, "unauthorized");
                }

                $curr_id = null;
                if (isset($params["curr_id"]) && $params["curr_id"]) {
                        $curr_id = $params["curr_id"];
                }

                if (!$curr_id) {
                        $curr_id = uniqid();
                }

                $create_dt = time();
                $path_arr = array();
                $path_arr[] = date("Y", $create_dt);
                $path_arr[] = date("m", $create_dt);
                $path_arr[] = date("d", $create_dt);
                $path_arr[] = $curr_id;

                $path_to_content = $this->posts_path;
                // create main posts dir if it not exists
                $this->create_dir_if_need($path_to_content);
                foreach ($path_arr as $value) {
                        // create dir in needed
                        $path_to_content .= $value . "/";
                        $this->create_dir_if_need($path_to_content);
                }

                // create or update main content file main_content.html
                file_put_contents($path_to_content . "main_content.html", $params["main_content"]);

                $elem = array(
                    "id" => $curr_id,
                    "user_id" => $this->userdata["id"],
                    "name" => $params["name"],
                    "short_content" => $params["short_content"],
                    "main_img" => $params["main_img"],
                    "create_dt" => $create_dt,
                    "modify_dt" => 0,
                    "path" => $path_to_content,
                );

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

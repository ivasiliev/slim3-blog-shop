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

final class CommentAction extends DataService {

        private $view;
        private $logger;
        private $comments_path;
        private $user;
        private $userdata;

        public function __construct(Twig $view, LoggerInterface $logger) {
                parent::__construct($view, $logger);
                $this->view = $view;
                $this->logger = $logger;
                $this->comments_path = Settings::COMMENTS_PATH;
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
                //$this->view->render($response, 'main.twig', array());
                //return $response;
        }
        
        public function Save(Request $request, Response $response, $args) {
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
        }
}

<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Action\Imgs;
use App\Action\Auth;

final class UserAction {

        private $view;
        private $logger;
        private $path;
        private $user;

        public function __construct(Twig $view, LoggerInterface $logger) {
                $this->view = $view;
                $this->logger = $logger;
                $this->path = __DIR__ . "/../../../public/css/photo/";
                $this->user = new Auth($this->view, $this->logger);
        }

        public function __invoke(Request $request, Response $response, $args) {
                return $response;
        }

        public function LoginCheck(Request $request, Response $response, $args) {
                $params = $request->getParsedBody();

                $userdata = $this->user->login($params['login'], $params['pass']);

                if ($userdata) {
                        return $response->withJson(array("result" => 200, "content" => array("type" => "success", "sid" => $userdata["session_id"])));
                } else {
                        return $response->withJson(array("result" => 400, "content" => "unknown"));
                }
        }

        public function RegClient(Request $request, Response $response, $args) {
                $params = $request->getParsedBody();

                $userdata = $this->user->reg($params['email'], $params['pass'], $params['name']);

                if ($userdata) {
                        if (isset($userdata["error"]) && $userdata["error"] !== "") {
                                return $response->withJson(array("result" => 400, "content" => array("type" => "error", "message" => $userdata["error"])));
                        }
                        return $response->withJson(array("result" => 200, "content" => array("type" => "success", "sid" => $userdata["session_id"])));
                }
                return $response->withJson(array("result" => 400, "content" => "unknown"));
        }

}

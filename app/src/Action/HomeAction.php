<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Action\Imgs;
use App\Action\Auth;

final class HomeAction {

        private $view;
        private $logger;
        private $user;

        public function __construct(Twig $view, LoggerInterface $logger) {
                $this->view = $view;
                $this->logger = $logger;
                $this->user = new Auth($this->view, $this->logger);
        }

        public function __invoke(Request $request, Response $response, $args) {
                $this->logger->info("Home page action dispatched");

                $data = json_decode(file_get_contents(__DIR__ . "/json/main.json"), true);

                $this->view->render($response, 'main.twig', array(
                    "nav_current" => "home",
                    "posts" => array("list" => array(1, 2, 3, 4, 5, 6, 7, 8, 9))
                ));
                return $response;
        }

        public function StubView(Request $request, Response $response, $args) {
                $this->view->render($response, 'stub.twig', array(
                    "nav_current" => ""
                ));
                return $response;
        }

        public function LoginView(Request $request, Response $response, $args) {
                $this->user->logout();
                $this->view->render($response, 'login.twig', array(
                    "nav_current" => ""
                ));
                return $response;
        }

        public function RegView(Request $request, Response $response, $args) {
                $this->user->logout();
                $this->view->render($response, 'reg.twig', array(
                    "nav_current" => ""
                ));
                return $response;
        }

}

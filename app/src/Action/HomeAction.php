<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Action\Imgs;
use App\Action\Auth;
use App\Blog\Action\BaseAction;

final class HomeAction {

    private $view;
    private $logger;
    private $user;
    private $userdata;
    private $blog;

    public function __construct(Twig $view, LoggerInterface $logger) {
        $this->view = $view;
        $this->logger = $logger;
        $this->user = new Auth($this->view, $this->logger);
        $this->userdata = $this->user->info();
        $this->blog = new BaseAction($view, $logger);
    }

    public function __invoke(Request $request, Response $response, $args) {
        $this->logger->info("Home page action dispatched");

        $posts = $this->blog->getPostsData();

        foreach ($posts as $key => $value) {
            $posts[$key]["author"] = $this->user->getUsersData($value["user_id"]);
        }

        $this->view->render($response, 'main.twig', array(
            "user" => $this->userdata,
            "site_section" => "blog",
            "nav_current" => "new",
            "posts" => $posts
        ));
        return $response;
    }

    public function StubView(Request $request, Response $response, $args) {
        $this->view->render($response, 'stub.twig', array(
            "user" => $this->userdata,
            "nav_current" => ""
        ));
        return $response;
    }

    public function LoginView(Request $request, Response $response, $args) {
        $this->user->logout();
        $this->view->render($response, 'login.twig', array(
            "user" => $this->userdata,
            "site_section" => "login",
            "nav_current" => ""
        ));
        return $response;
    }

    public function RegView(Request $request, Response $response, $args) {
        $this->user->logout();
        $this->view->render($response, 'reg.twig', array(
            "user" => $this->userdata,
            "site_section" => "registration",
            "nav_current" => ""
        ));
        return $response;
    }

}

<?php

namespace App\Action;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use App\ORM\DataService;
use App\Settings\Settings;

final class Auth extends DataService {

        private $view;
        private $logger;

        public function __construct(Twig $view, LoggerInterface $logger) {
                parent::__construct($view, $logger);
                $this->view = $view;
                $this->logger = $logger;
        }

        public function info() {
                if (isset($_SESSION[Settings::SESSIONCOOKIE]) && $_SESSION[Settings::SESSIONCOOKIE] !== '') {
                        $user_session = $_SESSION[Settings::SESSIONCOOKIE];
                        setcookie(Settings::SESSIONCOOKIE, $user_session, time() + Settings::SESSION_COOKIE_LIFETIME);
                } else {
                        $user_session = filter_input(INPUT_COOKIE, Settings::SESSIONCOOKIE);
                }
                return $this->getUserDataBySession($user_session);
        }

        public function reg($email, $pass, $name) {
                $users = $this->getUsersData();
                // check if user email is exists
                foreach ($users as $$curr) {
                        if ($curr["login"] === $email) {
                                // user already registered
                                return array("result" => 400, "error" => "user already created", "content" => array("email" => $email));
                        }
                }
                $user_id = uniqid();
                $users[$user_id] = Settings::UserBaseData($user_id, $email, $pass, $name);
                $this->saveUsersData($users);

                return $this->login($email, $pass);
        }

        public function uLogin($request) {
                $params = $request->getParsedBody();

                //$result = array($params);

                $s = file_get_contents('http://ulogin.ru/token.php?token=' . $params['token'] . '&host=' . $_SERVER['HTTP_HOST']);
                $uLogin = json_decode($s, true);
                //$user['network'] - соц. сеть, через которую авторизовался пользователь
                //$user['identity'] - уникальная строка определяющая конкретного пользователя соц. сети
                //$user['first_name'] - имя пользователя
                //$user['last_name'] - фамилия пользователя
                //return $response->withJson($uLogin);

                $result = [
                    "name" => $uLogin['first_name'] . " " . $uLogin['last_name'],
                    "email" => $uLogin['email'],
                    "phone" => null,
                    "vk_id" => null,
                    "ggl_id" => null,
                    "fb_id" => null
                ];

                //vkontakte,googleplus,facebook
                switch ($uLogin["network"]) {
                        case "vkontakte":
                                $result["vk_id"] = $uLogin['uid'];
                                break;
                        case "googleplus":
                                $result["ggl_id"] = $uLogin['uid'];
                                break;
                        case "facebook":
                                $result["fb_id"] = $uLogin['uid'];
                                break;
                }
        }

        public function login($login, $pass) {
                $user = $this->checkLogin($login, $pass);
                if ($user) {
                        $s_id = session_id();
                        if (!$s_id) {
                                // if session not exists
                                return array();
                        }
                        // create user session
                        $u_sessions = $this->getUsersSessions();
                        $u_sessions[$s_id] = array(
                            "user_id" => $user["id"],
                            "time_start" => time()
                        );
                        $this->saveUsersSessions($u_sessions);

                        $_SESSION[Settings::SESSIONCOOKIE] = $s_id;

                        return array(
                            "type" => "success",
                            "session_id" => $s_id
                        );
                }
                return array();
        }

        public function checkLogin($login, $pass) {
                $users = $this->getUsersData();
                foreach ($users as $curr) {
                        if ($curr["login"] === $login && $curr["pass"] === $pass) {
                                return $curr;
                        }
                }
                return array();
        }

        public function logout() {
                setcookie(Settings::SESSIONCOOKIE, "", time() - 1);
        }

        public function drop() {
                
        }

}

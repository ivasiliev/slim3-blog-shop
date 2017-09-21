<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// 404 page handler
$container['notFoundHandler'] = function ($c) {
        return new App\Action\NotFoundHandler($c->get('view'), '404.twig');
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container[App\Action\HomeAction::class] = function ($c) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'));
};

$container[App\Action\Imgs::class] = function ($c) {
    return new App\Action\Imgs($c->get('view'), $c->get('logger'));
};

$container[App\Action\Auth::class] = function ($c) {
    return new App\Action\Auth($c->get('view'), $c->get('logger'));
};

$container[App\Action\AdminAction::class] = function ($c) {
    return new App\Action\AdminAction($c->get('view'), $c->get('logger'));
};

$container[App\Blog\Action\BaseAction::class] = function ($c) {
    return new App\Blog\Action\BaseAction($c->get('view'), $c->get('logger'));
};

$container[App\Blog\Action\CommentAction::class] = function ($c) {
    return new App\Blog\Action\CommentAction($c->get('view'), $c->get('logger'));
};

$container[App\Action\UserAction::class] = function ($c) {
    return new App\Action\UserAction($c->get('view'), $c->get('logger'));
};

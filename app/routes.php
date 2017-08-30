<?php

// Routes
// pages

//------------------------------------------------------------------------------
// BASE project view routes (pages)
//------------------------------------------------------------------------------
$app->get('/', App\Action\HomeAction::class)
	->setName('homepage');


//------------------------------------------------------------------------------
// ADMIN routes
//------------------------------------------------------------------------------

$app->get('/account', App\Action\AdminAction::class)
	->setName('adminpage');





//------------------------------------------------------------------------------
// BLOG module routes
//------------------------------------------------------------------------------

// view
$app->get('/blog[/]', 'App\Action\HomeAction:BlogPage')
	->setName('blogpage');

$app->get('/blog/c/{curr_id}[/]', 'App\Action\HomeAction:BlogCurrPage')
	->setName('blogpage');

// api
$app->get('/api/blog/info[/]', 'App\Blog\Action\BaseAction:AdminMainView');
$app->get('/api/blog/categories/info[/]', 'App\Blog\Action\BaseAction:AdminCategoriesView');
$app->get('/api/blog/categories/form/{curr_id}[/]', 'App\Blog\Action\BaseAction:AdminCategoriesForm');

//------------------------------------------------------------------------------
// SHOP module routes
//------------------------------------------------------------------------------

// view

// api
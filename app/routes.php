<?php

// Routes
// pages

//------------------------------------------------------------------------------
// BASE project view routes (pages)
//------------------------------------------------------------------------------
$app->get('/', App\Action\HomeAction::class)
	->setName('homepage');

//------------------------------------------------------------------------------
// Login & Registration URLs
//------------------------------------------------------------------------------
$app->get('/login[/]', 'App\Action\HomeAction:LoginView');
$app->get('/reg[/]', 'App\Action\HomeAction:RegView');

$app->post('/api/checklogin[/]', 'App\Action\UserAction:LoginCheck');
$app->post('/api/regclient[/]', 'App\Action\UserAction:RegClient');


//------------------------------------------------------------------------------
// ADMIN routes
//------------------------------------------------------------------------------

$app->get('/account', App\Action\AdminAction::class)
	->setName('adminpage');

// admin stub
$app->get('/api/stub[/]', 'App\Action\HomeAction:StubView');

//------------------------------------------------------------------------------
// USERS routes
//------------------------------------------------------------------------------
$app->get('/api//info[/]', 'App\Action\UserAction:AdminView');
$app->get('/api//form[/]', 'App\Action\UserAction:AdminForm');
$app->get('/api//form/{curr_id}[/]', 'App\Action\UserAction:AdminForm');
$app->post('/api//save[/]', 'App\Action\UserAction:AdminSave');
$app->get('/api//{curr_id}[/]', 'App\Action\UserAction:AdminDrop');




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
$app->get('/api/blog/categories/form[/]', 'App\Blog\Action\BaseAction:AdminCategoriesForm');
$app->get('/api/blog/categories/form/{curr_id}[/]', 'App\Blog\Action\BaseAction:AdminCategoriesForm');
$app->post('/api/blog/categories/save[/]', 'App\Blog\Action\BaseAction:AdminCategoriesSave');
$app->get('/api/blog/categories/drop/{curr_id}[/]', 'App\Blog\Action\BaseAction:AdminCategoriesDrop');

$app->get('/api/blog/posts/info[/]', 'App\Blog\Action\BaseAction:AdminPostsView');
$app->get('/api/blog/posts/form[/]', 'App\Blog\Action\BaseAction:AdminPostsForm');
$app->get('/api/blog/posts/form/{curr_id}[/]', 'App\Blog\Action\BaseAction:AdminPostsForm');
$app->post('/api/blog/posts/save[/]', 'App\Blog\Action\BaseAction:AdminPostsSave');
$app->get('/api/blog/posts/drop/{curr_id}[/]', 'App\Blog\Action\BaseAction:AdminPostsDrop');

//------------------------------------------------------------------------------
// SHOP module routes
//------------------------------------------------------------------------------

// view

// api
<?php
require_once __DIR__.'/../vendor/autoload.php';
//create app
$app = new Silex\Application();
//include services
require_once __DIR__.'/../app/config/services.php';

//debug mode
$app['debug'] = true;

//routes
require 'routes.php';

return $app;

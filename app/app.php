<?php

$app = new Silex\Application();
$app['debug'] = true;

require 'routes.php';

return $app;

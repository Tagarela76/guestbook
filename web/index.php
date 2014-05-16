<?php

require_once __DIR__.'/../vendor/autoload.php'; 

/*use FractalizeR\Smarty\ServiceProvider as SmartyServiceProvider;*/
define('SMARTY_PATH', __DIR__ . '/../vendor/smarty/smarty');

$app = require __DIR__.'/../app/app.php';

$app->register(new GB\MainBundle\Provider\SmartyServiceProvider(), array(
          'smarty.dir' => SMARTY_PATH,
          'smarty.options' => array(
                'template_dir' => SMARTY_PATH . '/demo/templates',
                'compile_dir' => SMARTY_PATH . '/demo/templates_c',
                'config_dir' => SMARTY_PATH . '/demo/configs',
                'cache_dir' => SMARTY_PATH . '/demo/cache',),));

$app->run(); 
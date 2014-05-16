<?php

require_once __DIR__.'/../vendor/autoload.php'; 

/*use FractalizeR\Smarty\ServiceProvider as SmartyServiceProvider;*/
define('SMARTY_PATH', __DIR__ . '/../vendor/smarty/smarty');

$app = require __DIR__.'/../app/app.php';

$app->register(new GB\MainBundle\Provider\SmartyServiceProvider(), array(
          'smarty.dir' => SMARTY_PATH,
          'smarty.options' => array(
                'template_dir' => __DIR__.'/../src/GB/MainBundle/Resource/smarty/templates',
                'compile_dir' => __DIR__.'/../src/GB/MainBundle/Resource/smarty/templates_c',
                'config_dir' => __DIR__.'/../src/GB/MainBundle/Resource/smarty/configs',
                'cache_dir' => __DIR__.'/../src/GB/MainBundle/Resource/smarty/cache',),));

$app->run(); 
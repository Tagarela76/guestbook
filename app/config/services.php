<?php

use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use \Doctrine\Common\Cache\ApcCache;
use \Doctrine\Common\Cache\ArrayCache;
//register Doctrine Service Proviser
$app->register(new DoctrineServiceProvider, array(
    'db.options'    => array(
    'driver'        => 'pdo_mysql',
    'host'          => 'localhost',
    'dbname'        => 'guestbook',
    'user'          => 'root',
    'password'      => '',
    'charset'       => 'utf8',
    'driverOptions' => array(1002 => 'SET NAMES utf8',),
  ),

));

//register Doctrine Orm
$app->register(new Nutwerk\Provider\DoctrineORMServiceProvider(), array(
    'db.orm.proxies_dir'           => __DIR__.'/../cache/doctrine/proxy',
    'db.orm.proxies_namespace'     => 'DoctrineProxy',
    'db.orm.cache'                 =>
        !$app['debug'] &&extension_loaded('apc') ? new ApcCache() : new ArrayCache(),
    'db.orm.auto_generate_proxies' => true,
    'use_simple_annotation_reader' => false,
    'db.orm.entities'              => array(array(
        'type'      => 'annotation',
        'path'      =>__DIR__.'/../../src/GB/MainBundle/Entity',
        'namespace' => 'GB\MainBundle\Entity',
    )),
));

/*use FractalizeR\Smarty\ServiceProvider as SmartyServiceProvider;*/
define('SMARTY_PATH', __DIR__ . '/../../vendor/smarty/smarty');
//Pagination
define('PAGINATION_ITEM', 10);

$app->register(new GB\MainBundle\Provider\SmartyServiceProvider(), array(
    'smarty.dir' => SMARTY_PATH,
    'smarty.options' => array(
        'template_dir' => __DIR__.'/../../src/GB/MainBundle/Resource/smarty/templates',
        'compile_dir' => __DIR__.'/../../src/GB/MainBundle/Resource/smarty/templates_c',
        'config_dir' => __DIR__.'/../../src/GB/MainBundle/Resource/smarty/configs',
        'cache_dir' => __DIR__.'/../../src/GB/MainBundle/Resource/smarty/cache',),));

$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new \Kilte\Silex\Pagination\PaginationServiceProvider);
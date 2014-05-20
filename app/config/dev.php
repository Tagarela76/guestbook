<?php
/*
$app['debug'] = true;

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'dbname'   => 'tododb',
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => 'developer'
    ),
));
*/

use Dflydev\Silex\Provider\DoctrineOrm\DoctrineOrmServiceProvider;
use Silex\Application;
use Silex\Provider\DoctrineServiceProvider;
use \Doctrine\Common\Cache\ApcCache;
use \Doctrine\Common\Cache\ArrayCache;

$app->register(new DoctrineServiceProvider, array(
    'db.options'    => array(
    'driver'        => 'pdo_mysql',
    'host'          => 'localhost',
    'dbname'        => 'name',
    'user'          => 'root',
    'password'      => 'developer',
    'charset'       => 'utf8',
    'driverOptions' => array(1002 => 'SET NAMES utf8',),
  ),

));

// Register Doctrine ORM
/*$app->register(new DoctrineOrmServiceProvider, array(
    'db.orm.proxies_dir'           => __DIR__ . '/cache/doctrine/proxy',
    'db.orm.proxies_namespace'     => 'DoctrineProxy',
    'db.orm.cache'                 => 
        !$app['debug'] && extension_loaded('apc') ? new ApcCache() : new ArrayCache(),
    'db.orm.auto_generate_proxies' => true,
    'db.orm.entities'              => array(array(
        'type'      => 'annotation',       // entity definition 
        'path'      => __DIR__ . '/src/GB/MainBundle/Entity',   // path to your entity classes
        'namespace' => 'GB\MainBundle\Entity', // your classes namespace
    )),
));*/
$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => "/path/to/proxies",
    "orm.em.options" => array(
        "mappings" => array(
            // Using actual filesystem paths
            array(
                "type" => "annotation",
                "namespace" => "GB\MainBundle\Entity",
                "path" => __DIR__."\src\GB\MainBundle\Entity",
            ),
        ),
    ),
));
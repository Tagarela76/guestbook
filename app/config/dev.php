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

$app->register(new DoctrineServiceProvider, array(
    "db.options" => array(
        "driver" => "pdo_sqlite",
        "path" => "/path/to/sqlite.db",
    ),
));

$app->register(new DoctrineOrmServiceProvider, array(
    "orm.proxies_dir" => "/path/to/proxies",
    "orm.em.options" => array(
        "mappings" => array(
            // Using actual filesystem paths
            array(
                "type" => "annotation",
                "namespace" => "Foo\Entities",
                "path" => __DIR__."/src/Foo/Entities",
            ),
            array(
                "type" => "xml",
                "namespace" => "Bat\Entities",
                "path" => __DIR__."/src/Bat/Resources/mappings",
            ),
            // Using PSR-0 namespaceish embedded resources
            // (requires registering a PSR-0 Resource Locator
            // Service Provider)
            array(
                "type" => "annotation",
                "namespace" => "Baz\Entities",
                "resources_namespace" => "Baz\Entities",
            ),
            array(
                "type" => "xml",
                "namespace" => "Bar\Entities",
                "resources_namespace" => "Bar\Resources\mappings",
            ),
        ),
    ),
));
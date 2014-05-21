// bin/cli-config.php
<?php
//get app
$app = require __DIR__.'/../app/app.php';
//get doctrine orm
$em = $app['db.orm.em'];

$helpers = new Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));
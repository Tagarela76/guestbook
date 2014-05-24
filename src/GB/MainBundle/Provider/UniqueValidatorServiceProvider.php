<?php

namespace GB\MainBundle\Provider;

use GB\MainBundle\Model\UniqueValidator;
use Silex\ServiceProviderInterface;
use Silex\Application;

class UniqueValidatorServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['validator.unique'] = $app->share(function ($app) {
            $validator =  new UniqueValidator();
            $validator->setEm($app);

            return $validator;
        });
    }

    public function boot(Application $app) {}
}
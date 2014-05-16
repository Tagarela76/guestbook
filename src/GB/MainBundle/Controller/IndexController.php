<?php

namespace GB\MainBundle\Controller {

    use Silex\Application;
    use Silex\Route;
    use Silex\ControllerProviderInterface;
    use Silex\ControllerCollection;

    class IndexController implements ControllerProviderInterface
    {

        public function connect(Application $app)
        {
            $indexController = $app['controllers_factory'];
            $indexController->get("/", array($this, 'index'))->bind('index');
            $indexController->get("/homepage", array($this, 'homepage'))->bind('homepage');
            return $indexController;
        }

        public function index(Application $app)
        {
            return $app['smarty']->display('hello.tpl', array(
                        'name' => $name,
            ));
        }

        public function homepage(Application $app)
        {
            die('alala');
        }

    }
}
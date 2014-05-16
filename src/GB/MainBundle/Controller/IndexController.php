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
            $tpl =  'main.tpl';
            $cssSource = array(
                ''
            );
            $app['smarty']->assign('tpl', $tpl);
            $app['smarty']->assign('title', 'guestbook');
            return $app['smarty']->fetch('index.tpl', array());
           
        }

        public function homepage(Application $app)
        {
            
            return 'alala';
        }

    }
}
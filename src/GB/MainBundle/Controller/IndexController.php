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
            $indexController->get("/getMessageDialogContent", array($this, 'getMessageDialogContent'))->bind('getMessageDialogContent');
            $indexController->get("/saveMessage", array($this, 'saveMessage'))->bind('saveMessage');
            return $indexController;
        }

        public function index(Application $app)
        {
            $tpl = 'main.tpl';
            $cssSource = array(
                ''
            );
            //include js
            $jsSources = array(
                'jquery-1.4.2.min.js',
                'jquery-ui-1.8.2.custom.min.js',
                'messageManager.js'
            );

            $cssSources = array(
                'bootstrap.css',
                'jquery-ui-1.8.2.custom.css'
            );
            //assign variables to smarty
            $app['smarty']->assign('tpl', $tpl);
            $app['smarty']->assign('jsSources', $jsSources);
            $app['smarty']->assign('cssSources', $cssSources);
            $app['smarty']->assign('title', 'guestbook');

            return $app['smarty']->fetch('index.tpl', array());
        }

        /**
         * load message Dialog Content
         * ajax method
         * 
         * @param \Silex\Application $app
         * 
         * @return string
         */
        public function getMessageDialogContent(Application $app)
        {
            return $app['smarty']->fetch('sendMessageContainer.tpl');
        }

        /**
         * 
         * save message
         * ajax method
         * 
         * @param \Silex\Application $app
         */
        public function saveMessage(Application $app)
        {
            //get ajax request
            $messageDialogText = $app['request']->get('messageDialogText');
            $messageDialogEmail = $app['request']->get('messageDialogEmail');
            $messageDialogHomePage = $app['request']->get('messageDialogHomePage');
            $messageDialogUserName = $app['request']->get('messageDialogUserName');
            
            $em = $app['orm.em'];
            var_dump($em);
            return $messageDialogText;
        }

    }
}
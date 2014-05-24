<?php

namespace GB\MainBundle\Controller {

    use GB\MainBundle\Entity\Message;
    use GB\MainBundle\Model\MessageManager;
    use GB\MainBundle\Model\ImageManager;
    use \GB\MainBundle\Entity\Image;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
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
            $indexController->get("/getMessageDialogContent", array($this, 'getMessageDialogContent'))->bind('getMessageDialogContent');
            $indexController->post("/saveMessage", array($this, 'saveMessage'))->bind('saveMessage');
            $indexController->post("/addFileToMessage", array($this, 'addFileToMessage'))->bind('addFileToMessage');
            $indexController->get("/Preview", array($this, 'Preview'))->bind('Preview');
            return $indexController;
        }

        public function index(Application $app)
        {
            $manager = new MessageManager($app['db.orm.em']);
            //set Pagination
            //get current page
            $currentPage = $app['request']->get('page');
            //get message count
            $count = $manager->getMessageCount();
            //create pagination
            $pagination = $app['pagination']($count, $currentPage, PAGINATION_ITEM);
            $pages = $pagination->build();

            //get sort condition
            $sortCondition = $app['request']->get('sort');
            //get order
            $order = $app['request']->get('order');
            $messageArray = $manager->findAll($pagination, $sortCondition, $order);

            $tpl = 'main.tpl';
            //include js
            $jsSources = array(
                'jquery-1.4.2.min.js',
                'jquery-ui-1.8.2.custom.min.js',
                'messageManager.js'
            );

            $cssSources = array(
                'bootstrap.css',
                'jquery-ui-1.8.2.custom.css',
                'main.css'
            );
            //assign variables to smarty
            $app['smarty']->assign('tpl', $tpl);
            $app['smarty']->assign('jsSources', $jsSources);
            $app['smarty']->assign('cssSources', $cssSources);
            $app['smarty']->assign('title', 'guestbook');
            $app['smarty']->assign('messageArray', $messageArray);
            $app['smarty']->assign('pages', $pages);
            $app['smarty']->assign('currentPage', $currentPage);

            if($order == 'ASC'){
                $app['smarty']->assign('order', 'DESC');
            }else{
                $app['smarty']->assign('order', 'ASC');
            }
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

            //create message
            $message = new Message();
            $message->setEmail($messageDialogEmail);
            $message->setUserName($messageDialogUserName);
            $message->setHomePage($messageDialogHomePage);
            $message->setText($messageDialogText);
            $message->setCreationDate(time());
            //validate message
            $errors = $app['validator']->validate($message);
            $validateErrors = array();
            $responce = array(
                'messageId' => false,
                'validateErrors' => false
            );
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    $validateErrors[$error->getPropertyPath()] = $error->getMessage();
                }
                $responce['validateErrors'] = $validateErrors;
            }else{
                //save message
                $manager = new MessageManager($app['db.orm.em']);
                $messageId = $manager->saveMessage($message);
                $responce['messageId'] = $messageId;

                //save image
                $uploaddir = UPLOADS_PATH;
                foreach($_FILES as $file)
                {
                    $info = pathinfo($file['name']);
                    $ext = $info['extension'];
                    $fileName = md5(basename($file['name'])).time().'.'.$ext;
                    $imageManager = new ImageManager($app['db.orm.em']);
                    $image = new Image();
                    $image->setName($fileName);
                    $image->setRealName(basename($file['name']));
                    $image->setMessage($message);
                    $imageManager->saveImage($image);
                    if (!file_exists($uploaddir.'messageImage')) {
                        mkdir($uploaddir.'messageImage', 0777, true);
                    }
                    if (!file_exists($uploaddir.'messageImage/'.$messageDialogEmail)) {
                        mkdir($uploaddir.'messageImage/'.$messageDialogEmail, 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], $uploaddir .'messageImage/'.$messageDialogEmail.'/'.$fileName);
                }
            }

            return json_encode($responce);
        }

        public function Preview(Application $app)
        {
            $messageDialogUserName = $app['request']->get('messageDialogUserName');
            $messageDialogText = $app['request']->get('messageDialogText');
            $messageDialogEmail = $app['request']->get('messageDialogEmail');
            $messageDialogHomePage = $app['request']->get('messageDialogHomePage');

            $app['smarty']->assign('messageDialogUserName', $messageDialogUserName);
            $app['smarty']->assign('messageDialogText', $messageDialogText);
            $app['smarty']->assign('messageDialogEmail', $messageDialogEmail);
            $app['smarty']->assign('messageDialogHomePage', $messageDialogHomePage);

            return $app['smarty']->fetch('preview.tpl');
        }

    }
}
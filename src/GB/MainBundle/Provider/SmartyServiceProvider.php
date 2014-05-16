<?php
namespace GB\MainBundle\Provider;
 
use Silex\Application;
use Silex\ServiceProviderInterface;
use Smarty;
 
class SmartyServiceProvider implements ServiceProviderInterface
{
    public function boot(Application $app)
    {
    }
    
    public function register(Application $app)
    {
        $app['smarty'] = $app->share(function () use ($app) {
                if (!class_exists('Smarty') and !isset ($app['smarty.dir'])) {
                    throw new \RuntimeException("Smarty class is not loaded and 'smarty.dir' is not defined. Please provide this option to Application->register() call.");
                }

                if (!class_exists('Smarty') and isset ($app['smarty.dir'])) {
                    require_once($app['smarty.dir'] . '/libs/Smarty.class.php');
                }
                
                $smarty = isset($app['smarty.instance']) ? $app['smarty.instance'] : new \Smarty();

                if (isset($app["smarty.options"])) {
                    foreach ($app["smarty.options"] as $smartyOptionName => $smartyOptionValue) {
                        $smarty->$smartyOptionName = $smartyOptionValue;
                    }
                }

                $smarty->assign("app", $app);

                if (isset($app['smarty.configure'])) {
                    $app['smarty.configure']($smarty);
                }

                return $smarty;
        });
    }
}
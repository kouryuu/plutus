<?php

error_reporting(0); // Avoid weird header warnings.
require_once __DIR__.'/../vendor/autoload.php';
//
require_once __DIR__.'/../lib/Account.php';
require_once __DIR__.'/../lib/Transaction.php';
require_once __DIR__.'/../lib/User.php';
require_once __DIR__.'/../lib/Persistance.php';

// Controllers
require_once __DIR__.'/../lib/LoginCtrl.php';
require_once __DIR__.'/../lib/UserCtrl.php';

// Symfony namespaces
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_sqlite',
        'path'     => __DIR__.'/../app.db',
    ),
));

$app->get('/',function() use ($app){
  return $app['twig']->render('index.twig');
});
$app->post('/new/user','Plutus\UserController::createUser');
$app->post('/login','Plutus\LoginController::Login');


$app->run();
?>

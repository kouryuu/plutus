<?php

error_reporting(0); // Avoid weird header warnings.
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../lib/Account.php';
require_once __DIR__.'/../lib/Transaction.php';
require_once __DIR__.'/../lib/User.php';
require_once __DIR__.'/../lib/Persistance.php';
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

// $app->get('/',function() use ($app){
//   $user = new Plutus\User();
//   $user->createNewUser("testuser","Test User","simplePassword");
//   $persistance = new Plutus\Persistance($user);
//   $app['db']->executeQuery($persistance->saveNewUserSQL());
//   return 'TRUE';
//   // return $app['twig']->render('index.twig', array(
//   //     $account => $acc,
//   //   ));
// });
$app->post('/new/user',function(Request $request) use ($app){
  $user = new Plutus\User();
  $response = array();
  $response['errors'] = 0;
  $user_name = $request->get('user_name');
  $user_full_name = $request->get('user_full_name');
  $user_password_hash = $request->get('user_password_hash');
  if($user_name == null || $user_full_name == null || $user_password_hash == null ){
    $response['errors'] += 1;
    $response['error_desc'] = "Invalid request";
    print($user_name);
    return json_encode($response);
  }
  $user_exists = $app['db']->fetchAll("SELECT * from User WHERE user_name='.str($user_name).'");  //Should be escaped for XSS
  if(sizeof($user_exists) == 0){
    $user = new Plutus\User("","","");// I don't like this
    $user->createNewUser($user_name,$user_full_name,$password_hash);
    $user_pers = new Plutus\Persistance($user);
    try{
      $app['db']->executeQuery($user_pers->saveNewUserSQL());

    }catch(Exception $e){
      $response['errors'] += 1;
      $response['error_desc'] = "Could not create new user";
      //$e->getMessage();// This gets logged.
    }

  }else{
    $response['errors'] += 1;
    $response['error_desc'] = "User exists";
  }
  return json_encode($response);
});




$app->run();
?>

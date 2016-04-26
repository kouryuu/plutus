<?php

error_reporting(0); // Avoid weird header warnings.
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
$app->get('/',function() use ($app){
  return $app['twig']->render('index.twig', array(
        'name' => 'Rodri',
    ));
});
$app->run();
?>

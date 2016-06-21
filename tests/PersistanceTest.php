<?php
require_once 'lib/User.php';
require_once 'lib/Persistance.php';





class PeristanceTest extends PHPUnit_Framework_TestCase
{
  public function testUserPersist(){
    $user = new Plutus\User();
    $user->createNewUser("testuser","Test User","simplePassword");
    $per = new Plutus\Persistance($user);
    $user->updatePasswordHash("lala");

  }



}

?>

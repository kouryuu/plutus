<?php
require_once 'lib/User.php';
class UserTest extends PHPUnit_Framework_TestCase
{
  public function testCreateUser(){
    $user = new Plutus\User();
    $user->createUser("testuser","Test User","simplePassword");
    $this->assertEquals("testuser",$user->getUserName());

  }
  public function testChangePassword(){
    $user = new Plutus\User();
    $user->createUser("testuser","Test User","simplePassword");
    $this->assertTrue($user->doPasswordsMatch("simplePassword"));
    $user->updatePasswordHash("anotherPassword");
    $this->assertFalse($user->doPasswordsMatch("simplePassword"));
    $this->assertFalse($user->doPasswordsMatch("anotherPassword "));
    $this->assertTrue($user->doPasswordsMatch("anotherPassword"));
  }
}

?>

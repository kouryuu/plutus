<?php
require_once 'lib/User.php';
class UserTest extends PHPUnit_Framework_TestCase
{
  public function testCreateUser(){
    $user = new Plutus\User();
    $user->createNewUser("testuser","Test User","simplePassword");
    $this->assertEquals("testuser",$user->getUserName());
    $this->assertEquals("Test User",$user->getFullName());
    $this->assertEquals("TEST USER",$user->getFullNameUpp());

  }
  public function testChangePassword(){
    $user = new Plutus\User("testuser","Test User","simplePassword");
    $user->createNewUser("testuser","Test User","simplePassword");
    $this->assertTrue($user->doPasswordsMatch("simplePassword"));
    $user->updatePasswordHash("anotherPassword");
    $this->assertFalse($user->doPasswordsMatch("simplePassword"));
    $this->assertFalse($user->doPasswordsMatch("anotherPassword "));
    $this->assertTrue($user->doPasswordsMatch("anotherPassword"));
  }


}

?>

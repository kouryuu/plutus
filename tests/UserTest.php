<?php
require_once 'lib/User.php';
class AccountTest extends PHPUnit_Framework_TestCase
{
  public function testCreateUser(){
    $user = new User();
    $user->createUser("testuser","Test User","simplePassword");
    $this->assertEquals("testuser",$user->getUserName());

  }
  public function testChangePassword(){
    $user = new User();
    $user->createUser("testuser","Test User","simplePassword");
    $this->assertTrue($user->doPasswordsMatch("simplePassword"));
    $user->updatePasswordHash("anotherPassword");
    $this->assertFalse($user->doPasswordsMatch("simplePassword"));
    $this->assertTrue($user->doPasswordsMatch("anotherPassword"));
  }
}

?>

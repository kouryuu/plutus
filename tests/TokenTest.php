<?php
require_once 'lib/Token.php';
class TokenTest extends PHPUnit_Framework_TestCase
{
  public function testCreateToken(){
    $token = new Plutus\Token("","","");
    $token->createToken("testuser");
    $token2 = new Plutus\Token("","","");
    $token2->createToken("otheruser");
    $this->assertNotEquals($token->getUserName(),$token2->getUserName());
    $this->assertNotEquals($token->getToken(),$token2->getUserName());
  }
}

?>

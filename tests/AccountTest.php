<?php
require_once 'lib/Account.php';
class AccountTest extends PHPUnit_Framework_TestCase
{
  public function testCreateAccount(){
    $acc = new Plutus\Account('0000','FakeBank','Nick',0);
    $this->assertEquals('FakeBank',$acc->getBankName());
    
  }
}

?>

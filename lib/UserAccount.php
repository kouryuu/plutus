<?php
namespace Plutus;
/*
* This file is part of the Plutus project.
* @author Rodrigo R. <rodrigo@plethora.com.mx>
* @version 0.1
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
class UserAccount{

  /*
  * This class encapsulates the Account Object
  *
  */



// Defaults
private $UserName = 'anon';
private $FullName = 'Anonymus';
private $PasswordHash;
/**
 * Constructor.
 *
 *
 * @param string       $AccountNumber          This is the account number associated with such account
 * @param string       $BankName               The name of the bank that issues the account.
 * @param string       $NickName               A nickname for the account to be distinguishable without revealing the account NumberFormatter
 * @param integer      $CurrentBalance         An integer representing the value in cents of the account
 */

  public function createAccount($UserName,$FullName){
    $this->UserName = $UserName;
    $this->FullName = $FullName;
    $this->assignPasswordHash();
  }

  protected function assignPasswordHash(){
    $this->PasswordHash = sha1(rand(0,PHP_INT_MAX));
  }
  public function updatePasswordHash($password){
    $this->PasswordHash = sha1($password);
  }



}
?>

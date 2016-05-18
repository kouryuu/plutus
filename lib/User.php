<?php
namespace Plutus;
/*
* This file is part of the Plutus project.
* @author Rodrigo R. <rodrigo@plethora.com.mx>
* @version 0.1
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
class User{

  /*
  * This class encapsulates the Account Object
  *
  */



// Defaults
private $UserName;
private $FullName;
public $PasswordHash;
/**
 * Constructor.
 *
 *
 * @param string       $AccountNumber          This is the account number associated with such account
 * @param string       $BankName               The name of the bank that issues the account.
 * @param string       $NickName               A nickname for the account to be distinguishable without revealing the account NumberFormatter
 * @param integer      $CurrentBalance         An integer representing the value in cents of the account
 */




  public function createUser($UserName,$FullName,$password){
    $this->UserName = $UserName;
    $this->FullName = $FullName;
    $this->updatePasswordHash($password);

  }



  public function updatePasswordHash($password){
    $this->PasswordHash = password_hash($password,PASSWORD_BCRYPT,["salt"=>str_pad($this->FullName,22,"*")]);
  }
  public function doPasswordsMatch($password){
    return $this->PasswordHash == password_hash($password,PASSWORD_BCRYPT,["salt"=>str_pad($this->FullName,22,"*")]);
  }


  public function getUserName(){
    return $this->UserName;
  }
  public function getFullName(){
    return strtoupper($this->FullName);
  }
  public function setUserName($UserName){
    $this->UserName = $UserName;
  }


}
?>

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
private $PasswordHash;
/**
 * Constructor.
 *
 *
 * @param string       $UserName         This is the unique user name used to identify a user.
 * @param string       $FullName         The full name of the user.
 * @param string       $PasswordHash     A cryptographic hash generated using PHP's standard password_hash function.
 */
  public function __construct($UserName,$FullName,$PasswordHash){
    $this->UserName = $UserName;
    $this->FullName = $FullName;
    $this->PasswordHash = $PasswordHash;
  }
  public function createNewUser($UserName,$FullName,$password){
    $this->UserName = $UserName;
    $this->FullName = $FullName;
    $this->updatePasswordHash($password);

  }
  public function updatePasswordHash($password){
    $this->PasswordHash = password_hash($password,PASSWORD_BCRYPT);
  }
  public function doPasswordsMatch($password){
    return password_verify($password, $this->PasswordHash);
  }
  public function getUserName(){
    return $this->UserName;
  }
  public function getFullNameUpp(){
    return strtoupper($this->FullName);
  }
  public function getFullName(){
    return $this->FullName;
  }
  public function getPasswordHash(){
    return $this->PasswordHash;
  }
  public function setUserName($UserName){
    $this->UserName = $UserName;
  }


}
?>

<?php
namespace Plutus;
/*
* This file is part of the Plutus project.
* @author Rodrigo R. <rodrigo@plethora.com.mx>
* @version 0.1
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

class Token{

  /*
  * This class encapsulates the Account Object
  *
  */



// Defaults
private $UserName;
private $Token;
private $Timestamp;
/**
 * Constructor.
 *
 *
 * @param string       $UserName          This is the unique user name used to identify a user.
 * @param string       $Token             The token hash
 * @param integer      $Timestamp         The UNIX timestamp when the Token was issued.
 */
  public function __construct($UserName,$Token,$Timestamp){
      $this->UserName = $UserName;
      $this->Token = $Token;
      $this->Timestamp = $Timestamp;
  }
  public function createToken($username){
    $this->Timestamp = time();
    $this->Token = sha1($username.$this->Timestamp.rand(0,PHP_INT_MAX));
  }
  // Getters and Setters
  public function getToken(){
    return $this->Token;
  }
  public function getUserName(){
    return $this->UserName;
  }
  public function getTimestamp(){
    return $this->Timestamp;
  }
}
?>

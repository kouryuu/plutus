<?php
namespace Plutus;
/*
* This file is part of the Plutus project.
* @author Rodrigo R. <rodrigo@plethora.com.mx>
* @version 0.1
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
class Persistance{
public $object;
public $className;
public $sql;
public function __construct($object){
  $this->object = $object;
  $this->className = get_class($object);

}

public function saveOldUserSQL(){
  if($this->className == "Plutus\User"){
  // TODO VALIDATIONS
  return "UPDATE User SET full_name='".$this->object->getFullName()."' AND password_hash='".$this->object->getPasswordHash()."' WHERE user_name='".$this->object->getUserName()."'";
  }else{
  //throw new Exception('Method not available for that class.');
  }
}
public function saveNewUserSQL(){
  if($this->className == "Plutus\User"){
  // TODO VALIDATIONS
  return "INSERT INTO User (user_name,full_name,password_hash) VALUES ('".$this->object->getUserName()."','".$this->object->getUserName()."','".$this->object->getPasswordHash()."')";
  }else{
  //throw new Exception('Method not available for that class.');
  }
}





}
 ?>

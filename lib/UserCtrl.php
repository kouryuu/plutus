<?php
namespace Plutus;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
/*
* This file is part of the Plutus project.
* @author Rodrigo R. <rodrigo@plethora.com.mx>
* @version 0.1
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
class UserController{
  public function createUser(Request $request,Application $app){
    $user = new User();
    $response = array();
    $response['errors'] = 0;
    $user_name = $request->get('user_name');
    $user_full_name = $request->get('user_full_name');
    $user_password_hash = $request->get('user_password_hash');
    if($user_name == null || $user_full_name == null || $user_password_hash == null ){
      $response['errors'] += 1;
      $response['error_desc'] = "Invalid request";
      return json_encode($response);
    }
    $user_exists = $app['db']->fetchAll("SELECT * from User WHERE user_name='".$user_name."'");  //Should be escaped for XSS
    if(sizeof($user_exists) == 0){
      $user = new User("","","");// I don't like this
      $user->createNewUser($user_name,$user_full_name,$user_password_hash);
      $user_pers = new Persistance($user);
      try{
        $app['db']->executeQuery($user_pers->saveNewUserSQL());

      }catch(Exception $e){
        $response['errors'] += 1;
        $response['error_desc'] = "Could not create new user";
        //$e->getMessage();// This gets logged.
      }

    }else{
      $response['errors'] += 1;
      $response['error_desc'] = "User exists";
    }
    return json_encode($response);
  }
}
?>

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
class LoginController{

  public function Login(Request $request,Application $app){
    $response = array();
    $response['errors'] = 0;
    $user_name = $request->get('user_name');
    $user_password_hash = $request->get('user_password_hash');
    $user_exists = $app['db']->fetchAll("SELECT * from User WHERE user_name='".$user_name."'");  //Should be escaped for XSS
      if(sizeof($user_exists) == 1){
        $user_db = new User($user_exists[0]['user_name'],$user_exists[0]['full_name'],$user_exists[0]['password_hash']);
        if($user_db->doPasswordsMatch($user_password_hash)){
          $response['user_name']= $user_exists[0]['user_name'];
          $response['full_name']= $user_exists[0]['full_name'];
          return json_encode($response);
        }else{
          // Passwords do not match
          $response['errors'] += 1;
          $response['error_desc'] = "Wrong username or password"; // This message is encouraged to be the same as the one where the user does not exist to avoid clues for brute force attacks
        }
      }else{
        // The user does not exist
        $response['errors'] += 1;
        $response['error_desc'] = "The user does not exist.";
      }
      return json_encode($response);
    }
}
?>

<?php
namespace Model;


use \W\Model\Model;
use \W\Model\UsersModel;
use \W\Model\ConnectionModel;

class ConnectModel extends \W\Model\UsersModel
{

  public function connect() {

    $getUser = new UsersModel();
    $getUser2 = $getUser -> getUserByUsernameOrEmail($_GET['email']);

    if ($getUser2) {

      $bdh = ConnectionModel::getDbh();


      $sql = "SELECT * FROM w_users WHERE email = '" . $_GET['email'] ."' AND password = '" . $_GET['password']."'" ;


      $userLogin = $bdh -> query($sql) -> fetch();

      // var_dump($test);
      var_dump($_SESSION);

      if ($userLogin) {

        $_SESSION['user'] = array(
          'Username' => $userLogin['username'],
          'Password' => $userLogin['password'],
          'Email' => $userLogin['email'],
          'Role' => $userLogin['role'],

        );
      } else {
        return false;
      }

    }


  }



}

<?php
namespace Model;


use \W\Model\Model;
use \W\Model\UsersModel;
use \W\Model\ConnectionModel;

class ConnectModel extends \W\Model\UsersModel
{

  //Method pour la connection est la recuperation des infos dans une session
  public function connect() {

    //connection a la base de donnée
    $bdh = ConnectionModel::getDbh();

    //Recuperation des infos de l'utilisateur
    $sql = "SELECT * FROM w_users WHERE email = '" . $_POST['email'] ."' AND password = '" . $_POST['password']."'" ;

    $userLogin = $bdh -> query($sql) -> fetch();

    //Si la recuperation est reussi, stockage dans une session User
    if ($userLogin) {

      $_SESSION['user'] = array(
        'Username' => $userLogin['username'],
        'Password' => $userLogin['password'],
        'Email' => $userLogin['email'],
        'Role' => $userLogin['role'],
      );


    }

  }

  //Deconnection de l'utilisateur
  public function disconnect() {

    //Destruction de la session User
    unset($_SESSION['user']);

  }

  //Method pour s'inscrire
  public function inscription() {

    //connection a la base de donnée
    $bdh = ConnectionModel::getDbh();

    //preparation de la requete
    $sql = $bdh -> prepare("INSERT INTO w_users (username, email, password, role) VALUES (:username, :email, :password, :role)");

    //Execution de la requete avec les $_POST
    $test = $sql -> execute(array(
      'username' => $_POST['username'],
      'email' => $_POST['email'],
      'password' => $_POST['password'],
      'role' => $_POST['role'],
    ));

    if ($test) {
      return true;
    }
  }

}

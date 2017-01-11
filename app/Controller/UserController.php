<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use Model\ConnectModel;

class UserController extends \W\Controller\Controller
{

  //Affiche la page login
  public function Login() {

    if (!empty($_GET)) {

      var_dump($_GET);

      $log = new ConnectModel();
      $verifLog = $log -> connect();

    }

    $this->show('user/login');
  }

  //Affiche la page update
  public function Update() {

    $this->show('user/update');
  }

  //Affiche la page signin
  public function Signin() {

    $this->show('user/signin');
  }
}

<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \app\Model\ConnectModel;

class UserController extends \W\Controller\Controller
{

  //Affiche la page login
  public function Login() {

    $this->show('user/login');
  }

  //Affiche la page update
  public function Update() {

    $getUser = new UsersModel();
    $getUser2 = $getUser -> getUserByUsernameOrEmail('toto');
    var_dump($getUser2);

    $log = new ConnectModel();
    $verifLog = $log -> bonjour();

    $this->show('user/update');
  }

  //Affiche la page signin
  public function Signin() {

    $this->show('user/signin');
  }
}

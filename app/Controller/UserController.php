<?php
namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

  //Affiche la page login
  public function Login() {

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

<?php
namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller
{

  public function Login() {

    $this->show('user/login');
  }

  public function Update() {

    $this->show('user/update');
  }

  public function Signin() {

    $this->show('user/signin');
  }
}

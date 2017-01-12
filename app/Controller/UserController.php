<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;
use Model\UserModel;


class UserController extends \W\Controller\Controller
{

  //Affiche la page login
  public function Login() {

    //on verifie que $_POST n'est pas vide
    if (!empty($_POST['connect'])) {

      //On verifie si l'utilisateur est connecter
      if (empty($_SESSION['user'])) {

        //Instance du model ConnectionModel
        $loginModel = new UserModel();
        $loginModel -> connect();

      }
    }

    //On verifie que $_POST n'est pas vide
    if (!empty($_POST['disconnecte'])) {
      //On verifie que la session user existe
      if (!empty($_SESSION['user'])) {

        //Instance du model DecoMethod
        $deco = new UserModel();
        //On utilise la method disconnet
        $deco -> disconnect();

      }
    }
    //Affichage de la page
    $this->show('user/login');
  }


  //Affiche la page update
  public function UpdateUser() {
    //on verifie si les données envoyer son presante
    if (!empty($_POST['updateUser'])) {

      //On instancie le Model UserModel
      $userModel = new UserModel();
      //On utilise la method update
      $userModel -> updateUser();

    }

    $this->show('user/update');
  }

  //Affiche la page signin
  public function Signin() {


    $this->show('user/signin');
  }
}

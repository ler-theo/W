<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use Model\ConnectModel;

class UserController extends \W\Controller\Controller
{

  //Affiche la page login
  public function Login() {

    //On verifie si une session n'est pas ouverte
    if (empty($_SESSION['user'])) {

      //Verification du POST
      if (!empty($_POST['connect'])) {

        //Instance de userModel
        $getUser = new UsersModel();
        //Verification que l'email est present dans la BDD
        $getUser2 = $getUser -> getUserByUsernameOrEmail($_POST['email']);

        //Si l'email est present, je lance la verification de l'email=password
        if ($getUser2) {

          //Verification des infomartion entrée
          if ($getUser2['email'] === $_POST['email'] && $getUser2['password'] === $_POST['password']) {

            //Instance du model "ConenctModel"
            $log = new ConnectModel();
            //utilisation de la method "connect()"
            $log -> connect();

          } else {
            echo 'Erreur';
          }
        } else {
          echo 'Erreur';
        }
      }
      //Si un utilisateur est deja conencter, je propose un autre contenu
    } elseif (!empty($_SESSION['user']) && !empty($_POST['disconnecte'])) {

      //Instance du model "ConenctModel"
      $log = new ConnectModel();
      //utilisation de la method "disconnect()"
      $log -> disconnect();

    }

    $this->show('user/login');
  }

  //Affiche la page update
  public function Update() {

    $this->show('user/update');
  }

  //Affiche la page signin
  public function Signin() {

    //On verifie que l'utilisateur n'est pas connecter
    if (empty($_SESSION['user'])) {

      //Instance de userModel

        //S'il n'est pas conencter on verifie que $_POST n'est pas vide
        if (!empty($_POST['singin'])) {

          $getUser = new UsersModel();
          //Verification que l'email est present dans la BDD
          $getUser2 = $getUser -> getUserByUsernameOrEmail($_POST['email']);

          if (!$getUser2) {

            //Instance du model "ConenctModel"
            $log = new ConnectModel();
            //utilisation de la method "disconnect()"
            $confirm = $log -> inscription();

          //la method "inscription()" return true or false, se qui permet d'afficher un message
          if ($confirm) {
            echo "Inscription reussi";
          } else {
            echo "Echec de l'inscription";
          }

        } else {
          Echo 'Cette email est deja pris !';
        }
      }

    }

    $this->show('user/signin');
  }
}

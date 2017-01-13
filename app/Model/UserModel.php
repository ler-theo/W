<?php
namespace Model;


use \W\Model\Model;
use \W\Model\UsersModel;
use \W\Model\ConnectionModel;
use \W\Security\AuthentificationModel;

class UserModel extends \W\Model\UsersModel
{

  //Method pour la connection est la recuperation des infos dans une session
  public function connect() {

    //On verifie que email et password ne sont pas vide
    if (!empty($_POST['connect']) && !empty($_POST['password'])) {

      //Instance de la method AuthentificationModel
      $instance = new AuthentificationModel();
      //Utilisation de la method isValidLoginInfo pour verifier si l'utilisateur exist
      $passOk = $instance -> isValidLoginInfo($_POST['email'], $_POST['password']);

      //S'il exist je recupere les info et les stock dans un tableau
      if ($passOk != 0) {
        //Instance UserModel
        $userMethod = new UsersModel();
        //utilisation de la fonction getUserByUsernameOrEmail pour recupere les infos
        $user = $userMethod -> getUserByUsernameOrEmail($_POST['email']);

        //On place ensuite les info dans un tableau
        $userArray = array(
          "id" => $user['id'],
          "username" => $user['username'],
          "email" => $user['email'],
          "role" => $user['role'],
        );

        //On crée la session['user'] en utilisant la method logUserIn
        $instance -> logUserIn($userArray);

      }

    } else {
      //En cas de champ non remplis, on envoie un jolie petit message tout mignon
      echo 'Veuillez remplir les champs';
    }

  }

  //Deconnection de l'utilisateur
  public function disconnect() {

    //Instance de la method AuthentificationModel
    $disconnect = new AuthentificationModel();
    //Utilisation de la method logUserOut pour deconnecter l'utilisateur
    $disconnect -> logUserOut();

  }

  // Mise a jour de l'utilisateur
  public function updateUser() {

    //On verifie que les données existe
    if (!empty($_POST['username']) && !empty($_POST['email']) &&!empty($_POST['role'])) {

      //On Instance le model UserModel pour acceder au method du model abstrait Model dans le noyeau
      $model = new UserModel();

      //Création d'un tableau pour la method update()
      $arrayData = array(
        "username" => $_POST['username'],
        "email" => $_POST['email'],
        "role" => $_POST['role'],
      );

      //utilisation de la mathod update()
      $confirmUpdate = $model -> update($arrayData, $_SESSION['user']['id'], $stripTags = true);

      //Echo d'un message pour confirmer l'update
      if ($confirmUpdate) {

        echo 'User Win';

        //Instance de AuthentificationModel
        $refreshModel = new AuthentificationModel();

        //utilisation de la method pour mettre a jours la session
        $refreshModel -> refreshUser();

      } else {
        echo 'User loose';
      }
    }
  }

  //Création d'un nouvelle utilisateur
  public function Singin() {

    //Verification que les champs sont tous remplie
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {

      //On instancie le model UsersModel
      $modelVerif = new UsersModel();

      //On verifie que l'email n'est pas deja present en base de données avec la method emailExists
      $testEmail = $modelVerif -> emailExists($_POST['email']);
      if ($testEmail) {
        echo 'Email deja utiliser';
      } else {

        //On verifie que l'username n'est pas deja prit en BDD avec la method usernameExistst
        $testSpeudo = $modelVerif -> usernameExists($_POST['username']);

        if ($testSpeudo) {
          echo 'Username deja utilisé';
        } else {

          //On Instance le model UserModel pour acceder au method du model abstrait Model dans le noyeau
          $model = new UserModel();

          //On instance le model AuthentificationModel
          $modelHash = new AuthentificationModel();

          //Hashage du password avent l'insertion
          $passwordHash = $modelHash -> hashPassword($_POST['password']);

          //Definition d'un tableau pour definir les champs a remplir en BDD
          $arrayData = array(
            "username" => $_POST['username'],
            "email" => $_POST['email'],
            "password" => $passwordHash,
            "role" => $_POST['role'],
          );

          //Utilisation de la method insert pour ajouter l'utilisateur en BDD
          $insertUser = $model -> insert($arrayData, $stripTags = true);

          if ($insertUser) {
            echo 'Win !';
          } else {
            echo 'Losse !';
          }
        }
      }
    }
  }

}

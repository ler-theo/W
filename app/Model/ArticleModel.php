<?php
namespace Model;


use \W\Model\UsersModel;
use \W\Model\ConnectionModel;
use \W\Security\AuthentificationModel;

class ArticleModel extends \W\Model\Model
{

  public function articleWritten() {

    //On verifie que les infos recont sont remplie
    if (!empty($_POST['contenue'])) {

      var_dump($_POST['contenue']);

      //On instancie le model ArticleModel pour accerder aux methods de Model
      $model = new ArticleModel();

      //On definie le nom de la table
      $model -> setTable('w_article');

      //On crée un tableau pour l'inseré
      $arrayData = array(
        "contenue" => $_POST['contenue']
      );

      //On Insert les données en BDD
      $model -> insert($arrayData, $stripTags = false);

      //On return true
      return true;
    } else {
      echo 'Veuillez remplir tout les champs';
      return false;
    }
  }

  public function showArticle() {

    //instance du model ArticleModel pour accerder au fonction du noyeau
    $model = new ArticleModel();

    //On definie le nom de la table
    $model -> setTable('w_article');


    $article = $model -> findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);

    return $article;
  }
}

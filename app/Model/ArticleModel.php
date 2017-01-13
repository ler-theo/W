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

      //On Insert les données en BDD, passer la valeur a false pour garder les balise html
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


    $article = $model -> findAll();

    //utilisation de la boucle pour afficher les different commentaire
    for ($i=0; $i < count($article) ; $i++) {

      if (empty($articleList)) {

        $articleList = "<form action='' method='post'>
        <textarea name='contenue' rows='10' cols='100'>"
         . $article[$i]['contenue']
         . "</textarea>
         <input type='submit' name='updateArticle' value='Envoyer'>
         </form>";

      } elseif (!empty($articleList)) {

        $articleList .= "<form action='' method='post'>
        <textarea name='contenue' rows='10' cols='100'>"
         . $article[$i]['contenue']
         . "</textarea>
         <input type='submit' name='updateArticle' value='Envoyer'>
         </form>";
      }
    }
    return $articleList;
  }
}

<?php
namespace Controller;

use \W\Controller\Controller;
use Model\ArticleModel;

class ArticleController extends Controller
{

  //Affiche la page written
  public function Written() {

    //On verifie que le $_POST n'est pas vide
    if (!empty($_POST['writtenArticle'])) {

      //On instancie le Model ArticleWritten
      $model = new ArticleModel();

      //On appel la method articleWritten
      $insertSucces = $model -> articleWritten();

      //On verifie le resultat
      if ($insertSucces) {

        echo 'Insertion reussie';

      } else {

        echo 'Echec de l\'insertion';

      }

    }


    $this->show('article/written');
  }

  //Affiche la page update
  public function Update() {

    $this->show('article/update');
  }

  //Affiche la page voir
  public function Voir() {

    //Instance de ArticleModel
    $model = new ArticleModel();

    //Appel de la method pour afficher les article
    $showArticle = $model -> showArticle();


    for ($i=0; $i < count($showArticle) ; $i++) {

      echo $showArticle[$i]['contenue'];

    }
    
    //Affichage de l'article
    $this->show('article/voir');
  }

}

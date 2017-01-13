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

    $this->show('article/voir',
    [
      //Possibilité d'ajout de variable accessible par des variables dans la page ou la method est appeler
      "articleTrois" => "<p>testlayout",
      "articleQuatre" => "testDeux</p>"
    ]);
  }

}

<?php
namespace Controller;

use \W\Controller\Controller;

class ArticleController extends Controller
{

  //Affiche la page written
  public function Written() {

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

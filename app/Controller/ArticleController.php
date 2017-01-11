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

    $this->show('article/voir', ["articleTrois" => "<p>testlayout", "articleQuatre" => "testDeux</p>"]);
  }

}

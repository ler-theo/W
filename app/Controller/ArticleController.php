<?php
namespace Controller;

use \W\Controller\Controller;

class ArticleController extends Controller
{

  public function Written() {

    $this->show('article/written');
  }

  public function Update() {

    $this->show('article/update');
  }

  public function Voir() {

    $this->show('article/voir');
  }

}

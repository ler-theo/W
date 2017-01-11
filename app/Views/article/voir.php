<?php $this->layout('layout', ['title' => 'Bouyaka']) ?>

<?php $this->start('main_content') ?>
<?= $articleTrois ?>
<?= $articleQuatre ?>
<p>C'est la page article/voir</p>
<?php $this->stop('main_content') ?>

<?php $this->start('aRemplir') ?>
<h2>Teub</h2>
<?= $articleTrois ?>
<p>Où es tu?</p>
<?= $articleQuatre ?>
<p>C'est la page article/voir</p>
<?php $this->stop('aRemplir') ?>

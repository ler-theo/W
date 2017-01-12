<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<?php if (!empty($_SESSION['user'])) {?>
  
<?php } else { ?>

<?php } ?>


<?php $this->stop('main_content') ?>

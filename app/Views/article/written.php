<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<form action="<?= $this -> url('article_written') ?>" method="post">

  <p>
    <label for="contenue">Contenue :
      <textarea name="contenue" rows="10" cols="100"></textarea>
    </label>
  </p>

  <input type="submit" name="writtenArticle" value="Envoyer">

</form>
<?php $this->stop('main_content') ?>

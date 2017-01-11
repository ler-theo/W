<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<h1>Se connecter</h1>
<form action="<?= $this -> url('user_login') ?>" method="get">

  <p>
    <label for="email">Email :
      <input type="email" name="email" value="">
    </label>
  </p>
  <p>
    <label for="password">Password :
      <input type="text" name="password" value="">
    </label>
  </p>

  <p>
    <input type="submit" name="envoyer" value="Envoyer">
  </p>
</form>

<?php $this->stop('main_content') ?>

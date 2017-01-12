<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<?php if (empty($_SESSION['user'])) { ?>

<h1>Se connecter</h1>

<form action="<?= $this -> url('user_login') ?>" method="post">

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
    <input type="submit" name="connect" value="Envoyer">
  </p>

</form>

<?php } elseif (!empty($_SESSION['user'])) { ?>

  <h1>Se deconnecter</h1>

  <form action="<?= $this -> url('user_login') ?>" method="post">

    <input type="submit" name="disconnecte" value="Bye !">

  </form>


<?php } ?>
<p><a href="<?= $this -> url('default_home') ?>">Retour à l'acceuil</a></p>

<?php $this->stop('main_content') ?>

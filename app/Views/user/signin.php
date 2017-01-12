<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<?php
  //On verifie que l'utilisateur n'est pas connecter
  if (empty($_SESSION['user'])) { ?>

  <h3>Veuillez vous inscrire</h3>

  <form action="<?= $this -> url('user_signin') ?>" method="post">

    <p>
      <label for="username">Username :
        <input type="text" name="username" value="">
      </label>
    </p>

    <p>
      <label for="email">Email :
        <input type="email" name="email" value="">
      </label>
    </p>

    <p>
      <label for="password">Password :
        <input type="password" name="password" value="">
      </label>
    </p>

    <p>
      <label for="role">Role :
        <input type="text" name="role" value="">
      </label>
    </p>

    <input type="submit" name="singin" value="Inscription">

  </form>

<?php }
  //Si l'utilisateur est deja connecter on le redirige vers l'acceuil
  else { ?>

  <h3>Vous etes deja conencter</h3>
  
<?php } ?>
<p><a href="<?= $this -> url('default_home') ?>">Retour à l'acceuil</a></p>
<?php $this->stop('main_content') ?>

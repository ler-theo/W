<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<?php if (!empty($_SESSION['user'])) { ?>

<form action="<?= $this -> url('user_update') ?>" method="post">

  <p>
    <label for="username">Username :
      <input type="text" name="username" value="<?php echo $_SESSION['user']['username'] ?>">
    </label>
  </p>

  <p>
    <label for="email">Email :
      <input type="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
    </label>
  </p>

  <p>
    <label for="role">Role :
      <input type="text" name="role" value="<?php echo $_SESSION['user']['role'] ?>">
    </label>
  </p>

  <input type="submit" name="updateUser" value="Mettre a jours">

</form>

<?php } else { ?>

  <p>Veuillez vous connecter</p>

<?php } ?>

<p><a href="<?= $this -> url('default_home') ?>">Retour à l'acceuil</a></p>
<?php $this->stop('main_content') ?>

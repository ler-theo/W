<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>

<h1>Mon compte</h1>
<form action="index.html" method="post">
  <p>
    <label for="nom">Nom :
      <input type="text" name="nom" value="">
    </label>
  </p>
  <p>
    <label for="prenom">Prenom :
      <input type="text" name="prenom" value="">
    </label>
  </p>
  <p>
    <label for="email">Email :
      <input type="email" name="email" value="">
    </label>
  </p>
  <p>
    <input type="submit" name="envoyer" value="Envoyer">
  </p>
</form>

<?php $this->stop('main_content') ?>

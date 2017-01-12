<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's code.</h2>
	<p>Vous avez atteint la page d'accueil. Bravo.</p>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>
	<div class="">
    <h2>Navigation</h2>
    <h3>Article</h3>
		<ul>
			<li><a href="Article/Written">Written</a></li>
			<li><a href="Article/Update">Update</a></li>
			<li><a href="Article/Voir">Voir</a></li>
		</ul>
    <h3>User</h3>
    <ul>
      <li><a href="User/Login">

				<?php
				//On change le message afficher en cas de connection ou de deconnection
				if (empty($_SESSION['user'])) { ?>
					Login
				<?php } else { ?>
					Disconnect
				<?php } ?>

			</a></li>
      <li><a href="User/Update">Update</a></li>
      <li><a href="User/Signin">Sign In</a></li>
    </ul>
	</div>

<?php $this->stop('main_content') ?>

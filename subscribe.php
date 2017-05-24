<?php require 'header.php'; ?>

<div class="subscribe_title">
    <h2>Veuillez remplir les champs</h2>
</div>

<div class="subscribe_form">
	<form action="subscribe_post.php" method="post">
		<div class="name">
			<input type="text" id="name" name="last_name" placeholder="Nom" required="required">
		</div>
		<div class="surname">
			<input type="text" id="surname" name="first_name" placeholder="Prénom" required="required">
		</div>
		<div class="username">
	        <input type="text" name="username" id="nickname" placeholder="Identifiant" required="required">
        </div>
        <div class="email">
        	<input type="mail" name="email" placeholder="Adresse email" required="required">
        </div>
        <div class="phone">
        	<input type="number" name="phone" placeholder="Numéro De Téléphone" required="required">
        </div>
		<div class="password">
			<input type="password" name="password" placeholder="Mot De Passe" required="required">
		</div>
		<div class="validate">
	        <button>Valider</button>
        </div>
	</form>
</div>


<?php require 'footer.php'; ?>
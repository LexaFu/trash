<?php require 'header.php'; ?>


<div class="subscribe_title">
    <h2>Veuillez remplir les champs</h2>
</div>

<div class="subscribe_form">
	<form action="subscribe_post.php" method="get">
		<div class="name">
			<input type="text" id="name" name="last_name" placeholder="Nom" required="required" maxlength="20">
		</div>
		<div class="surname">
			<input type="text" id="surname" name="first_name" placeholder="Prénom" required="required" maxlength="20">
		</div>
		<div class="username">
	        <input type="text" name="username" id="nickname" placeholder="Identifiant" required="required" maxlength="20">
        </div>
        <div class="email">
        	<input type="mail" name="email" placeholder="Adresse email" required="required" maxlength="40">
        </div>
        <div class="phone">
        	<input type="number" name="phone" placeholder="Numéro De Téléphone" pattern="[0-9]{10}" required="required">
        </div>
		<div class="password">
			<input type="password" name="password" placeholder="Mot De Passe" required="required" maxlength="20">
		</div>
		<div >
	        <button class="validate">Valider</button>
        </div>
	</form>
</div>


<?php require 'footer.php'; ?>
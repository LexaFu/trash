<?php require 'header.php'; ?>
<div class="subscribe_container">
	<div class="subscribe_ctn">
		<form action="subscribe_post.php" method="get" class="subscribe_form">
			<div class="name">
				<input type="text" id="name" name="last_name" placeholder="Nom" required="required" maxlength="20">
			</div>
			<div class="surname">
				<input type="text" id="surname" name="first_name" placeholder="Prénom" required="required" maxlength="20">
			</div>
			<div class="username">
			    <input type="text" name="username" id="nickname" placeholder="Pseudo (Identifiant)" required="required" maxlength="20">
		    </div>
		    <div class="email">
		        <input type="email" name="email" placeholder="Adresse email" required="required" maxlength="40">
		    </div>
		    <div class="phone">
		        <input type="tel" name="phone" placeholder="Numéro De Téléphone" pattern="[0-9]{10}" required="required">
		    </div>
			<div class="password">
				<input type="password" name="password" placeholder="Mot De Passe" required="required" maxlength="20">
			</div>
			<div class="validate">
			    <input type="submit" value="Valider"></button>
		    </div>
		</form>
	</div>
</div>

<?php require 'footer.php'; ?>
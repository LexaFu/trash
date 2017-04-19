<?php require 'header.php' ?>

<div class="login_title">
    <h2>Veuillez vous connecter</h2>
</div>

<div class="login_form">
    <form action="login_post.php" method="post">
	    <div class="username">
	        <input type="text" name="username" id="nickname" placeholder="Identifiant">
        </div>
        <div class="password">
	        <input type="password" name="password" id="password" placeholder="Mot de passe">
        </div>
        <div class="validate">
	        <input type="submit" value="Valider">
        </div>
        <div id="subscribe">
            <a href="subscribe.php">s'incrire</a>
        </div>
        <div id="login_recover">
		  <a href="">mot de passe oublié ?</a>
        </div>
    </form>
</div>

<?php require 'footer.php' ?>
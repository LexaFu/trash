<?php require 'header.php' ?>

<div class="login_container">
    <div class="lgn_ctn">
        <form action="login_post.php" method="post">
	        <input type="text" name="username" id="nickname" placeholder="Identifiant"><br>
	        <input type="password" name="password" id="password" placeholder="Mot de passe"><br>
            <input type="submit" value="Connexion"><br>
            <a href="mdpO.php">mot de passe oublié ?</a> 
        </form>
        <div class="subsc_link">
            <a href="subscribe.php">s'incrire</a>
        </div>
    </div>
</div>

<?php require 'footer.php' ?>
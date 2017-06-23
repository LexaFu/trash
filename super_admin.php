<?php 
include 'header.php';
?>

<h2>Ajouter un employé</h2>

<div class="add_team">
	<form action="super_admin_post.php" method="post">
		<table>
			<tr>
				<th>Identifiant</th>
		 		<th>Mot de passe</th>
		 		<th>Nom</th>
		 		<th>Prénom</th>
		 		<th>Email</th>
		 		<th>Téléphone</th>
		 		<th>Adresse</th>
		 		<th>Statut (1)</th>
	 		</tr>

	 		<tr>
		 		<td><input type="text" name="username"></td>
		 		<td><input type="text" name="password"></td>
		 		<td><input type="text" name="first_name"></td>
		 		<td><input type="text" name="last_name"></td>
		 		<td><input type="email" name="email"></td>
		 		<td><input type="number" name="phone"></td>
		 		<td><input type="text" name="address"></td>
		 		<td><input type="number" name="status"></td>
	 		</tr>

		</table>
	</form>
</div>

<div class="team">
	<p>Pour voir l'état de la prise en charge des encombrants, veuillez cliquer <a href="team_page.php">ici</p>
</div>


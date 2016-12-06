<div class="container" id="connexion">
	<h1>Connexion</h2>
	<?php
		if(isset($inscErrorText))
		echo '<span class="error">' . $inscErrorText . '</span>';
		$login = "anonymous"; 
		$errorText = ""; 
		$successfullyLogged = false;	
		
		
		if(isset($_POST['login']) && isset($_POST['password'])) {
			$tryLogin=$_POST['login']; 
			$tryPwd=$_POST['password'];
				
			// si login existe et password correspond 
			if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
				$successfullyLogged = true; 
				$login = $tryLogin; 
				session_start();
				$_SESSION['login'] = $login;	
				echo 'connecté';
			} 
			else $errorText = "Erreur de mail/password"; 
		} 
			
		
			
		if(!$successfullyLogged) { 
			echo $errorText; 
		} 
	?>
	<!--<img id="connexionImage" src="images/connexion.png" alt="">-->
	<form method="POST" action="index.php?controller=Anonymous&&action=validateConnexion" id="connexionFormulaire"> 
		<table> 
			<tr> 
				<th>Mail :</th> 
				<td><input type="text" id="connexionTd" name="connLogin" class="form-control"></td> 
			</tr>
			<tr> 
				<th>Mot de passe :</th> 
				<td><input type="password" id="connexionTd" name="connPassword" class="form-control"></td>
			</tr> 
			<tr> 
				<th></th> 
				<td><input type="submit" id="connexionTd" name="connexion" class="btn btn-info" value="Connexion" /></td> 
			</tr> 
			<tr> 
				<th></th> 
				<td><input type="submit" id="connexionTd" name="creationCompte" class="btn btn-primary" value="Créer un compte" /></td> 
			</tr> 
			<tr> 
				<th></th> 
				<td><input type="submit" id="connexionTd" name="mdpOublie" class="btn btn-info-outline" value="Mot de passe oublié ?" /></td>
			</tr> 
		</table> 
	</form>
</div>


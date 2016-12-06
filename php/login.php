<?php
// on simule une base de données 
	$users = array( // login => password 
		'riri' => 'fifi', 'yoda' => 'maitrejedi' 
	);
	
	//variables
	
	$login = "anonymous"; 
	$errorText = ""; 
	$successfullyLogged = false;
	
	if(isset($_POST['creationCompte'])){
		header('Location: index.php?controller=Anonymous&action=inscription');
	}

	
	
	if(isset($_POST['login']) && isset($_POST['password'])) {
		$tryLogin=$_POST['login']; 
		$tryPwd=$_POST['password'];
		
		// si login existe et password correspond 
		if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
			$successfullyLogged = true; 
			$login = $tryLogin; 
			$_SESSION['login'] = $login;
			//echo $login;
			//session_write_close();
			header('Location: connected.php');
		} 
		else $errorText = "Erreur de login/password"; 
	} 
	
	//si on a rien dans le POST
	else {
		$errorText = "Merci d'utiliser le formulaire de login pour vous connecter";
		//echo $successfullyLogged;
		
	
	}
	
	
	if(!$successfullyLogged) { 
		echo $errorText; 
	} 
	
	?>
<form method="POST" action='<?php $action ?>' id="login_form"> 

	<table> 
		<tr> 
			<th>Login :</th> <td><input type="text" name="login"></td> 
		</tr>
		<tr> 
			<th>Mot de passe :</th> <td><input type="password" name="password"></td>
		</tr> 
		<tr> <th></th> <td><input type="submit" name="connexion" value="Connexion" /></td> </tr> 
		<tr> <th></th> <td><input type="submit" name="creationCompte" value="Créer un compte" /></td> </tr> 
		</table> 
</form>

		


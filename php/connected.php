<?php 
	//La session
	session_start();
	
	//if (!isset($_SESSION['login'])||empty($_SESSION['login']))
	//	header('Location: index.php');
		
	
	//else { 
	
		if (isset($_SESSION['login'])){
			

		echo "<h1>Bienvenue ".$_SESSION['login']."</h1>"; 
		}
	
?>
		<h1>Connexion réussie ! maintenant va falloir faire des liens</h1>
		<nav><ul>
			<li><a href='index.php?page=home&css=css'>Accueil</a></li>
			<li><a href='index.php?page=login&css=css'>Login</a></li>   <!--on passe un parametre a la page index pour tomber sur login.php-->
			<li><a href='index.php?page=disconnected&css=css'>se déconnecter</a></li>
			</ul>
		</nav>
	
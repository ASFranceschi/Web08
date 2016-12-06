<?php
	$email=$_GET['mail'];
	$reponse=$_GET['reponse'];
	function mdp($email,$reponse){
		$reponseBdd = UserModel::getReponse($email);
		if( $reponseBdd==$reponse){
			echo 	"<h2>Votre mot de passe est :</h2>
					<h3>" . UserModel::getMdp($email) . "</h3>
					<div> Pensez-y la prochaine fois ! </div>";
		}
		else {
			echo  "<h3><br>La réponse est incorrecte.</h3>
					<br><a href='index.php?controller=Anonymous&action=mdpOublie&mail=";
						echo $email;
						echo "'><div id='evenementTd'><input type='submit' id='eventParticiper' name='accueil' class='btn btn-info' value='Reessayer' /></div></a>";
		}
	}
?>


<div class="container" id="mdpOublie">
	<?php
		mdp($email,$reponse);
		
	?>
</div>

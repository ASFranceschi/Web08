<?php
	$idu=UserModel::get_Id();
	
	function eventListT($idUser){
		
		$array=ParticiperModel::getNbInscription($idUser);
				
		$count = sizeof($array);
		
		if($count==0)
			echo "Vous n'êtes pas encore inscrit à un cours";
		else{	
			for($i=0;$i<$count;$i++){	
				$tc= $array[$i];
				$idEvent= EventModel::getIdFromTC($tc);
				echo "<div id='evenementTd'><strong>";
				echo $tc;
				echo "</strong>";
				
				echo"<a href='index.php?controller=User&idUser=";
				echo $idUser;
				echo"&idEvent=";
				echo $idEvent;
				echo "&action=userDeparticiper'>
					<input type='submit' id='eventParticiper' name='departiciper' class='btn btn-danger' value='Désinscription' /></div></a>
				</div>";
			}
		}
	}
			
?>

<div class="container" id="profil">
	
	<h1>Voici vos informations</h1>
	
	<div id="profilBox">
	
		<div id="profilTd"><strong>Mail : </strong><?php echo UserModel::getMail($idu);?></div>

		<div id="profilTd"><strong>Mot de passe : </strong><?php echo UserModel::getMdpProfil($idu);?></div>
	
		<div id="profilTd"><strong>Nom : </strong><?php echo UserModel::getNom($idu);?></div>
		
		<div id="profilTd"><strong>Prénom : </strong><?php echo UserModel::getPrenom($idu); ?></div>

		<div id="profilTd"><strong>Adresse : </strong><?php echo UserModel::getAdresse($idu);?></div>

		<div id="profilTd"><strong>Date de naissance : </strong><?php echo UserModel::getDateNaissance($idu);?></div>

		<div id="profilTd"><strong>Sexe : </strong><?php echo UserModel::getSexe($idu);?></div>
		
		<div id="profilTd"><strong>Question secrète : </strong>
			<?php 
				$q=UserModel::getQuestionProfil($idu);
				if($q==1)
					echo "Quel est le nom de votre première licorne ?";
				else {
					if ($q==2)
						echo "Quel est le nom de jeune fille de votre arrière grand mère ?";
					else 
						echo "Quelle est votre race de chien préférée ?";
				}
			?>
		</div>
		
		<div id="profilTd"><strong>Réponse : </strong><?php echo UserModel::getReponseProfil($idu);?></div>
		
		<a href="index.php?controller=User&idUser=<?php echo $idu;?>&action=modifierProfil">
			<div id="boutonProfilTd">
				<input type="submit" id="profilTd" name="modifierProfil" class="btn btn-primary" value="Modifier mes informations" />
			</div>
		</a>
		
		<a href="index.php?controller=User&idUser=<?php echo $idu;?>&action=supprimerCompte" 
			onclick="if (window.confirm('Etes-vous sur de vouloir supprimer definitivement votre compte ?')) {
						return true;
					} 
					else {return false;}">
			<div id="boutonProfilTd">
				<input type="submit" id="profilTd" name="supprimerCompte" class="btn btn-danger" value="Supprimer mon compte" />
			</div>
		</a>
		
	</div>
	
	<div id="evenementBox">
		<p>Liste des Cours </p><?php eventListT($idu); ?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>


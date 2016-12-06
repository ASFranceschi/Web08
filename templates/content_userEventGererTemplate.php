<?php
	$id=EventModel::get_Id();
	$idu=UserModel::get_Id();
	
	function produits ($ide){
		$array = ProposerModel::userTableauProduit($ide);
		if(sizeof($array)!=NULL){
			for($i=0;$i<sizeof($array);$i++){
				echo "<div id='evenementTd'><strong>Produits : </strong>";
				echo $array[$i];
				echo "</div>";
				
			}
		}
	}
	
?>
<div class="container" id="evenement">
	<h1>Détails du cours <?php echo EventModel::getTC($id);?></div></h1>
	<div id="evenementBox">
	
		<div id="evenementTd"><strong>Titre long : </strong><?php echo EventModel::getTL($id);?></div>

		<div id="evenementTd"><strong>Description : </strong><?php echo EventModel::getDescription($id);?></div>
		
		<div id="evenementTd"><strong>Ouverture : </strong><?php echo EventModel::getOuverture($id);?></div>

		<div id="evenementTd"><strong>Fermeture : </strong><?php echo EventModel::getFermeture($id);?></div>

		<div id="evenementTd"><strong>Catégorie : </strong><?php echo EventModel::getCategorie($id);?></div>	
		
		<div id="evenementTd"><strong>Tarif : </strong><?php echo PossederModel::getTarif($id);?></div>
				
		<?php produits($id)?>
		
	
	</div>
	
	
	<a href="index.php?controller=User&idUser=<?php echo $idu;?>&idEvent=<?php echo $id;?>&action=modifierEvent">
			<div id="boutonProfilTd">
				<input type="submit" id="profilTd" name="modifierProfil" class="btn btn-primary" value="Modifier les informations" />
			</div>
		</a>
		
		<a href="index.php?controller=User&idUser=<?php echo $idu;?>&idEvent=<?php echo $id;?>&action=supprimerEvent" 
			onclick="if (window.confirm('Etes-vous sur de vouloir supprimer definitivement votre cours ?')) {
						return true;
					} 
					else {return false;}">
			<div id="boutonProfilTd">
				<input type="submit" id="profilTd" name="supprimerCours" class="btn btn-danger" value="Supprimer le cours" />
			</div>
		</a>
	
		
</div>
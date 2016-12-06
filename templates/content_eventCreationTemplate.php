<?php
	$idu=UserModel::get_Id();
	date_default_timezone_set("Europe/Madrid");
	$annee = date("Y");
	$mois = date("m");
	$jour = date("d");

	if(isset($inscErrorText))
	echo '<span class="error">' . $inscErrorText . '</span>';

	function year($debut,$fin){
		for($i=$debut;$i<=$fin;$i++){
			echo '<OPTION value='.$i.'>'.$i.'</OPTION>';
		}
	}
	
	function month(){
		echo '<OPTION value=1>Janvier</OPTION>';
		echo '<OPTION value=2>Février</OPTION>';
		echo '<OPTION value=3>Mars</OPTION>';
		echo '<OPTION value=4>Avril</OPTION>';
		echo '<OPTION value=5>Mai</OPTION>';
		echo '<OPTION value=6>Juin</OPTION>';
		echo '<OPTION value=7>Juillet</OPTION>';
		echo '<OPTION value=8>Aout</OPTION>';
		echo '<OPTION value=9>Septembre</OPTION>';
		echo '<OPTION value=10>Octobre</OPTION>';
		echo '<OPTION value=11>Novembre</OPTION>';
		echo '<OPTION value=12>Décembre</OPTION>';
	}
		
	function day($debut,$fin){
		for($i=$debut;$i<=$fin;$i++){
			echo '<OPTION value='.$i.'>'.$i.'</OPTION>';
		}
	}
	
	
	
	function produitListDivT(){
		$array=ProduitModel::produitTableauEvent();
		$count = sizeof($array);
			
		for($i=0;$i<$count;$i++){	//mettre les images de la BdD et dans le href le lien vers le cours en question avec idEvent=...
			$lib= $array[$i];
			$id= ProduitModel::getIdFromLib($lib);//le bon id !
			echo '<OPTION value='.$id.'>'.$lib.'</OPTION>';
			
		}
	}
	
	
?>


<div class="container" id="inscription">
	<h1>Création d'un cours</h1>	
	<form id="inscriptionFormulaire" action="index.php?controller=User&idUser=<?php echo $idu;?>&action=creationEventValidee" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<th>Titre Court* :</th>
				<td><input type="text" name="TC" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Titre Long :</th>
				<td><input type="text" name="TL" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Date d'ouverture :</th>
				<td><SELECT NAME=yearO>
						<?php year($annee,2018); ?>
					</SELECT>
					<SELECT NAME=monthO>
						<?php month(); ?>
					</SELECT>
					<SELECT NAME=dayO>
						<?php day(1,31); ?>
					</SELECT>
				</td>
			</tr>
			<tr>
				<th>Date de Fermeture:</th>
				<td><SELECT NAME=yearF>
						<?php year($annee,2020); ?>
					</SELECT>
					<SELECT NAME=monthF>
						<?php month(); ?>
					</SELECT>
					<SELECT NAME=dayF>
						<?php day(1,31); ?>
					</SELECT>
				</td>
			</tr>
			<tr>
				<th>Description :</th>
				<td><input type="text" name="desc" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Image (max 1 Mo):</th>
				<td><input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
					<input type="file" name="image"  id="inscriptionTd"/>
					
					
				
				</td>
			</tr>
			
			<tr>
				<th>Catégorie :</th>
				<td><SELECT NAME="cat">
						<OPTION value="Informatique">Informatique</OPTION>
						<OPTION value="Dessin">Dessin</OPTION>
						<OPTION value="Musique">Musique</OPTION>
						<OPTION value="Musique">Autre</OPTION>
					</select>
				
				</td>
			</tr>
			
			<tr>
				<th>Type d'événement :</th>
				<td>
					<input type="radio" name="private" value="0" id="inscriptionTd" checked="checked"/> <label for="0">Public</label>
					<input type="radio" name="private" value="1" id="inscriptionTd"/> <label for="1">Privé</label>
				</td>
			</tr>
			
			<tr>
				<th>Produits disponibles :</th>
				<td><SELECT NAME="produit">
					<OPTION value="0">--</OPTION>
						<?php produitListDivT()?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Quantité :</th><td><input type="text" name="quantiteP" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
			<th>Tarif Unitaire :</th><td><input type="text" name="tarifP" class="form-control" id="inscriptionTd"/></td>
			
				
			</tr>
			
			
			<tr>
				<th></th>
				<td><input type="submit" value="Creer mon cours" class="btn btn-primary" id="inscriptionTd"/></td>
			</tr>
		</table>
	</form>
</div>
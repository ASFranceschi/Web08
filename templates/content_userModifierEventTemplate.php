<?php
	$id=EventModel::get_Id();
	
	
		function cat($ide){
			$array = AppartenirModel::tableauCategorie();
			for($i=0;$i<=sizeof($array);$i++){
				echo '<OPTION value='.$array[$i].'>'.$array[$i].'</OPTION>';
				echo $array[$i];
			}
		}
		
		
?>

<div class="container" id="profil">
	
	<h1>Modifier les informations du cours <?php echo EventModel::getTC($id);?> </h2>
	
	<table>
			<tr>
				<th>Titre Long :</th>
				<td><input type="text" name="modifTL" placeholder="<?php echo EventModel::getTL($id);?>" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Description :</th>
				<td><input type="text" name="modifD" placeholder="<?php echo EventModel::getDescription($id);?>" class="form-control" id="inscriptionTd"/></td>
			</tr>
			
			<tr>
				<th>Catégorie : </th>
				
				<td>
					<div id="profilTd">
						<td><SELECT NAME=cat>
							<?php cat($id);?>
						</select>
					</div>
				</td>	
			</tr>
			
		<tr>
				<td>
					<div id="profilTd">
						<input type="submit" id="profilTd" name="modifierProfil" class="btn btn-info" value="Valider les modifications" />
					</div>
				</td>
			</tr>
		</table>

		
	
	
</div>


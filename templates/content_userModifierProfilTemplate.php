<?php
	$id=UserModel::get_Id();
	
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
		
		
?>

<div class="container" id="profil">
	
	<h1>Modifier vos informations</h2>
	
	<form id="modificationFormulaire" action="index.php?controller=User&idUser=<?php echo $id; ?>&action=validateModificationProfil" method="post">
		<table>
			<tr>
				<th>Mail :</th>
				<td><input type="text" name="modifMail" placeholder="<?php echo UserModel::getMail($id);?>" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Nom :</th>
				<td><input type="text" name="modifNom" placeholder="<?php echo UserModel::getNom($id);?>" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Prenom* :</th>
				<td><input type="text" name="modifPrenom" placeholder="<?php echo UserModel::getPrenom($id);?>" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Nouveau mot de passe* :</th>
				<td><input type="password" name="modifPassword" placeholder="<?php echo UserModel::getMdpProfil($id);?>" oncopy="return false;" oncut="return false;" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Confirmation mot de passe* :</th>
				<td><input type="password" name="confirmModifPassword" placeholder="<?php echo UserModel::getMdpProfil($id);?>" onpaste="return false;" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Adresse :</th>
				<td><input type="text" name="modifAddress" placeholder="<?php echo UserModel::getAdresse($id);?>" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Date de Naissance :</th>
				
				<td>
					<div id="profilTd">
						<input type="text" name="modifDate" placeholder="<?php echo UserModel::getDateNaissance($id);?>" class="form-control"/>
					</div>
				</td>	
			</tr>
			<tr>
				<th>Sexe :</th>
				<td>
					<input type="radio" name="modifSexe" value="F" id="inscriptionTd" checked="checked"/> <label for="F">Féminin</label>
					<input type="radio" name="modifSexe" value="M" id="inscriptionTd"/> <label for="M">Masculin</label>
				</td>
			</tr>
			<tr>
				<th>
				
				<?php 
					$q=UserModel::getQuestionProfil($id);
					if($q==1)
						echo "Quel est le nom de votre première licorne ?";
					else {
						if ($q==2)
							echo "Quel est le nom de jeune fille de votre arrière grand mère ?";
						else 
							echo "Quelle est votre race de chien préférée ?";
					}
				?>
				</th>
				
			</tr>
			<tr>
				<th>Réponse :</th>
				<td><input type="text" name="modifReponse" placeholder="<?php echo UserModel::getReponseProfil($id);?>" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<td>
					<div id="profilTd">
						<input type="submit" id="profilTd" name="modifierProfil" class="btn btn-info" value="Valider les modifications" />
					</div>
				</td>
			</tr>
		</table>
	</form>
		
	
	
</div>


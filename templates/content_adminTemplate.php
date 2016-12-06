<?php
	function userList(){
		$array=UserModel::compteurUsers();
		$count = sizeof($array);
		
		for($i=0;$i<$count;$i++){
			$idu= $array[$i];
			$idA=UserModel::get_Id();
			echo 	"<tbody>
						<tr>
							<td>"; echo $idu; echo "</td>
							<td>"; echo UserModel::getMail($idu); echo "</td>
							<td>"; echo UserModel::getMdpProfil($idu); echo "</td>
							<td>"; echo UserModel::getNom($idu); echo "</td>
							<td>"; echo UserModel::getPrenom($idu); echo "</td>
							<td>"; echo UserModel::getAdresse($idu); echo "</td>
							<td>"; echo UserModel::getRole($idu); echo "</td>
							<td>"; echo UserModel::getDateNaissance($idu); echo "</td>
							<td>"; echo UserModel::getSexe($idu); echo "</td>
							<td>"; echo UserModel::getQuestionProfil($idu); echo "</td>
							<td>"; echo UserModel::getReponseProfil($idu); echo "</td>
							<td><a href='index.php?controller=User&idUser=";
								echo $idA; 
								echo"&idSuppr=";
								echo $idu;
								echo "&action=supprimerCompteUtilisateur'>
								<input type='submit' value='Supprimer' class='btn btn-primary'/></a></td>
						</tr>
					</tbody>";
				
		}
	}
	
	function coursList(){
		$array=EventModel::compteurEvent();
		$count = sizeof($array);
		
		for($i=0;$i<$count;$i++){
			$ide= $array[$i];
			$idA=UserModel::get_Id();
			echo 	"<tbody>
						<tr>
							<td>"; echo $ide; echo "</td>
							<td>"; echo EventModel::getTL($ide); echo "</td>
							<td>"; echo EventModel::getTC($ide); echo "</td>
							<td>"; echo EventModel::getOuverture($ide); echo "</td>
							<td>"; echo EventModel::getFermeture($ide); echo "</td>
							<td>"; echo EventModel::getDescription($ide); echo "</td>
							<td>"; echo EventModel::getCategorie($ide); echo "</td>
							<td>"; echo EventModel::isPrivate($ide); echo "</td>
							<td><a href='index.php?controller=User&idUser=";
								echo $idA; 
								echo"&idEventSuppr=";
								echo $ide;
								echo "&action=supprimerCoursAdmin'>
								<input type='submit' value='Supprimer' class='btn btn-primary'/></a></td>
						</tr>
					</tbody>";
				
		}
	}
?>
<div class="container">	
	<h1>Informations d'administration</h1>

	<h2 class="sub-header">Liste des utilisateurs</h2>
	<div class="table-responsive">
        <table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Mail</th>
					<th>Mot de passe</th>
					<th>Nom</th>
					<th>Prénom</th>
					<th>Adresse</th>
					<th>Rôle</th>
					<th>Naissance</th>
					<th>Sexe</th>
					<th>Q</th>
					<th>R</th>
				</tr>
			</thead>
			<?php
				userList();
			?>
		</table>
	</div>
    
	<h2 class="sub-header">Liste des cours</h2>
	<div class="table-responsive">
        <table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Titre long</th>
					<th>Titre court</th>
					<th>Ouverture</th>
					<th>Fermeture</th>
					<th>Description</th>
					<th>Catégorie</th>
					<th>Privé</th>
				</tr>
			</thead>
			<?php
				coursList();
			?>
		</table>
	</div>
</div>
 
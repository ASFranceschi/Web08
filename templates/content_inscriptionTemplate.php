<div class="container" id="inscription">
	<h1>Inscription</h2>
	<?php
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
	?>
	<!--formulaire POST d'inscription-->
	<!--<img id="inscriptionImage" src="images/inscription.png" alt="Ardoise d'écolier">-->
	<form id="inscriptionFormulaire" action="index.php?controller=Anonymous&action=validateInscription" method="post">
		<table>
			<tr>
				<th>Mail* :</th>
				<td><input type="text" name="inscLogin" class="form-control" placeholder="Exemple : prenom.nom" id="inscription2Td"/>@
					<input type="text" name="messenger" class="form-control" placeholder="Exemple : minesdedouai" id="inscription2Td"/>
				</td>
                <td>.</td>
                <td><SELECT NAME=domain>
						<OPTION value="fr">fr</OPTION>
						<OPTION value="com">com</OPTION>
                    </select>
                </td>
			</tr>
			<tr>
				<th>Mot de passe* :</th>
				<td><input type="password" name="inscPassword" oncopy="return false;" oncut="return false;" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Confirmation mot de passe* :</th>
				<td><input type="password" name="confirmInscPassword" onpaste="return false;" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Nom :</th>
				<td><input type="text" name="nom" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Prenom* :</th>
				<td><input type="text" name="prenom" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Adresse :</th>
				<td><input type="text" name="address" class="form-control" id="inscriptionTd"/></td>
			</tr>
			<tr>
				<th>Date de Naissance :</th>
				<td><SELECT NAME=year>
						<?php year(1950,2016); ?>
					</SELECT>
					<SELECT NAME=month>
						<?php month(); ?>
					</SELECT>
					<SELECT NAME=day>
						<?php day(1,31); ?>
					</SELECT>
				</td>
			</tr>
			<tr>
				<th>Sexe :</th>
				<td>
					<input type="radio" name="Sexe" value="F" id="inscriptionTd" checked="checked"/> <label for="F">Féminin</label>
					<input type="radio" name="Sexe" value="M" id="inscriptionTd"/> <label for="M">Masculin</label>
				</td>
			</tr>
			<tr>
				<th>Question Secrète* :</th>
					<td><SELECT NAME=question>
						<OPTION value=1>Quel est le nom de votre première licorne ?</OPTION>
						<OPTION value=2>Quel est le nom de jeune fille de votre arrière grand mère ?</OPTION>
						<OPTION value=3>Quelle est votre race de chien préférée ?</OPTION>
					</select>
					<br>
					<input type="text" name="reponse" class="form-control" id="inscriptionTd"/>
				</td>
			</tr>
			
			<tr>
				<th></th>
				<td><input type="submit" value="Creer mon compte" class="btn btn-primary" id="inscriptionTd"/></td>
			</tr>
		</table>
	</form>
</div>
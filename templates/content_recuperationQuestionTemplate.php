<?php
	
		$email=$_GET['mail'];
	
	
	
	function testEmail($email){
			if(UserModel::isLoginUsed($email)){
				echo "<h1>Etape 2 : Entrez votre réponse à la question secrète</h2>";
				$q = UserModel::getQuestion($email);
				echo "<form method='POST' action='index.php?controller=Anonymous&&action=recupQuestion&mail=".$email."' id='mdpOublieFormulaire'> 
							<table> 
								<tr> 
									<th>";
										if($q==1)
											echo "Quel est le nom de votre première licorne ?";
										else{
											if($q==2)
												echo "Quel est le nom de jeune fille de votre arrière grand mère ?";
											else
												echo "Quelle est votre race de chien préférée ?";
										}
									echo "</th> 
									<td><input type='text' id='reponseTd' name='reponseType' class='form-control'></td> 
								</tr>
								<tr>
									<td><input type='submit' id='reponseTd' name='ReponseTd' class='btn btn-info' value='Accéder à votre mot de passe' /></td>
								</tr> 
							</table> 
						</form>";
			}
			else {
				echo  "<h3><br>Cette adresse mail est incorrecte. Pas étonnant que vous ne puissiez pas vous connecter !</h3>
						<br><a href='index.php?controller=Anonymous&action=mdpOublie&mail=";
						echo $email;
						echo "'><div id='evenementTd'><input type='submit' id='eventParticiper' name='accueil' class='btn btn-info' value='Reessayer' /></div></a>";
	
						
			}
	}
?>


<div class="container" id="reponse">
	<?php testEmail($email); ?> 
</div>
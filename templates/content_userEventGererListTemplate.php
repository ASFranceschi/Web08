<?php

$idu= $_GET['idUser'];

	function getImgFromSql($ide){
		$conn = EventModel::getImage($ide);
		
		
		 $sql = "SELECT ID_EVENEMENT, IMAGE FROM evenement WHERE ID_EVENEMENT = :ide";
		$q = $conn->prepare($sql);
		$q->bindParam(':ide', $ide); 
		$q->execute();
		$q->bindColumn(1, $id);
		$q->bindColumn(2, $cover, PDO::PARAM_LOB);
		while($q->fetch()){
			file_put_contents("images/".$id.".jpg",$cover);
			echo "<img src='images/".$id.".jpg' alt='image' style='width:150px;height:150px'> <br/>";
		}
	
	}

	function eventListDivT($idUser){
		$role=UserModel::getRole($idUser);
					
		if($role=='P')
			echo "Vous n'avez pas encore créé de cours."; 
			
		else{
			
			$array=GererModel::gererTableauEvent($idUser);
			$count = sizeof($array);
				
			for($i=0;$i<$count;$i++){	//mettre les images de la BdD et dans le href le lien vers le cours en question avec idEvent=...
				$tc= $array[$i];
				$id= EventModel::getIdFromTC($tc);//le bon id !
				echo 	"<div class='col-md-4'>
							<a href='index.php?controller=User&action=gererEvent&idUser=";
				echo $idUser;
				echo"&idEvent=";
				echo $id;
				echo"' class='thumbnail'>
						<p>".$tc."</p>   ";
				getImgFromSql($id);
				echo"</a>
						</div>";
			}
		}
	}
	
?>
<div class="container">	
	<h1>Liste des cours que vous avez créé</h1>
	
	<a href='index.php?controller=User&action=creerEvent&idUser=<?php echo $idu?>' <div id='evenementTd'><input type='submit' id='eventParticiper' name='creerEvent' class='btn btn-primary' value='Créer un cours' /></a>
	<br>	
	<br>
	<?php eventListDivT($idu)?>
	<br>
	
</div>

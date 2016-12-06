<?php
	
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
	
	
	function eventListDivT(){
		$array=EventModel::anonymousTableauEvent();
		$count = sizeof($array);
			
		for($i=0;$i<$count;$i++){	//mettre les images de la BdD et dans le href le lien vers le cours en question avec idEvent=...
			$tc= $array[$i];
			$id= EventModel::getIdFromTC($tc);//le bon id !
			echo 	"<div class='col-md-4'>
						<a href='index.php?controller=Anonymous&action=eventShow&idEvent=";echo $id; echo"' class='thumbnail'>
							<p>".$tc."</p>   ";
							getImgFromSql($id);
			echo 	"	</a>
					</div>";
		}
	}
?>
	
<div class="container">
	<h1>Liste des cours publics</h1>
	<p>Pour accéder aux cours privés, connectez-vous.</p>
	<a href="index.php?controller=Anonymous&action=connexion">
		<div id="evenementTd"><input type="submit" id="connexionTd" name="connexion" class="btn btn-info" value="Connexion" /></div>
	</a>
	<br>
	
	<?php eventListDivT()?>

</div>

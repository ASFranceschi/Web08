<?php 
	$id=UserModel::get_Id();
	$role=UserModel::getRole($id);
?>

<body> 
	<header><?php 
	$id=UserModel::get_Id();
	$role=UserModel::getRole($id);
?>

<body> 
	<header>
		<div class="navbar-wrapper">
			<div class="container">

			<nav class="navbar navbar-inverse navbar-fixed-top"> <!--navbar-fixed-top ou navbar-static-top-->
			   <div class="container">
			   <div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="index.php?controller=User&action=eventListDiv&idUser=<?php echo $id;?>">Cours en ligne</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php?controller=User&idUser=<?php echo $id;?>">Accueil</a></li>
						<li><a href="index.php?controller=User&action=userProfil&idUser=<?php echo $id;?>">Mon profil</a></li>
						<li><a href="index.php?controller=User&action=developpeuses&idUser=<?php echo $id;?>">A propos</a></li>
						<li><a href="index.php?controller=User&action=gererListEvent&idUser=<?php echo $id;?>">Gerer des cours</a></li>
						<?php 
							if($role=='A'){
						?>
								<li><a href="index.php?controller=User&action=administration&css=css&idUser=<?php echo $id;?>">Administration</a></li>
						<?php
							}
						?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a id="pageactive">Bonjour <?php echo UserModel::getPrenom($id); ?></a></li>
						<li><a href="index.php?controller=User&action=deconnection">
							<button type="button" class="btn btn-primary">Déconnexion</button>
						</a></li>
					</ul>
				</div>
			  </div>
			</nav>
		</div>
    </header>

		

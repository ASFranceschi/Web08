<?php 
	$id=UserModel::get_Id();
?>

<div class="container">
	
	<h1> Cours en Colonnes #MotsCroisés </h1>
	<p>
		
	Bienvenue sur notre site de cours en ligne ultra professionel, pédagogique, et utile.
	<br>
	
	"Numéro 1 des sites de cours en ligne" -- d'après Le Goraphi
	<br>
	
	</p>
	
</div>

<!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
	  <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
      </ol>
	  
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="images/caroussel1.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Présentation</h1>
              <p>Ce site permet de suivre des cours en ligne.</p>
              <p><a class="btn btn-lg btn-primary" href="index.php?controller=User&idUser=<?php echo $id;?>&action=eventListDiv"<?php echo $id;?> role="button">Voir les cours</a></p>	<!-- Renvoie vers une page listant tous les cours, y compris les privés.-->
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="images/caroussel2.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>A propos des développeuses</h1>
              <p>Ce site est le fruit du travail acharné de deux étudiantes hyper swagg de l'Ecole des Mines de Douai, Anne-Sophie FRANCESCHI et Alexandra LIN.</p>
              <p><a class="btn btn-lg btn-primary" href="index.php?controller=User&action=developpeuses&idUser=<?php echo $id;?>" role="button">En savoir plus ;)</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
<!-- Fin du carousel -->
	
		// SETTINGS
$(document).ready(function(){
	$("#listEvent").click(function(){
		var ligne =  $("#sliderL").val();
		var colonne = $("#sliderC").val();
		var espace = 10;
		localStorage.removeItem("ligne");
		localStorage.removeItem("colonne");
		localStorage.removeItem("espace");  	
		localStorage.setItem("ligne", ligne);
		localStorage.setItem("colonne", colonne);
		localStorage.setItem("espace", espace);
		//window.location = "taquin.html"; 
	});	
});



		// GRILLE		
$(document).on('pageinit','#listEvent',function(){
	
			// variable grille (le mal)
	
	var hauteur;
	var largeur;
	var ligne = localStorage.getItem("ligne");
	var colonne = localStorage.getItem("colonne");
	var espace = 10;	
	
	var compteur = 0;
	

		// function grille
	function grille(){
		var nbL;
		var nbC	;
		var nbDiv =0;
		for(nbL = 0; nbL < ligne;nbL++){
			for (nbC = 0; nbC < colonne; nbC++){
				var nouvelleDiv = $("<div class = 'shadow' id = L"+(nbL+1)+"C"+(nbC+1)+" name = "+nbDiv+"></div>"); 
				nouvelleDiv.css('height', hauteur/ligne);
				nouvelleDiv.css('width', largeur/colonne);
			
				nouvelleDiv.css('background-size', largeur+"px "+ hauteur+"px");				
				nouvelleDiv.css('background-position' , -nbC*largeur/colonne+"px "+ -nbL*hauteur/ligne+"px");
				nouvelleDiv.css('margin-right' , espace+"px ");
				nouvelleDiv.css('margin-bottom', espace-5+"px ");
				$("#base").append(nouvelleDiv);			
				nbDiv++;
			}
		var nouvelleDiv2 = $("<div></div>");
		nouvelleDiv2.css("height","0px");
			$("#base").append(nouvelleDiv2);
		}
		
	};
	
		

});

	


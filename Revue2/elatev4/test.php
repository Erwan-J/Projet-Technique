<script>
//////////////////////////////////////////////charger les données
	function loadData() 
		{

		xhttp = new XMLHttpRequest();
			
		xhttp.onload = function() 
			{
				//document.getElementById("demo").innerHTML = this.responseText;
				var test = this.responseText;
				//var tab = JSON.parse(test);
				console.log(test);
                document.val = "js_var = " + test
			}
//"http://172.19.128.35/lireBoussolep"
		xhttp.open("GET","http://172.19.128.35/lireBoussole" );
		xhttp.send();
		}

	

	loadData();
</script>


<?php

							//    // On se connecte à MySQL
						   include_once("database.php");
							// Connexion à la base de données
							$idcom = connect_DB();
                            
                            $inclinaison = $val['donner'];
							echo $inclinaison;
							
						   
						   
?> 